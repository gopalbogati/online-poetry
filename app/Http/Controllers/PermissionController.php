<?php

namespace App\Http\Controllers {

    use App\Http\Controllers\Controller;
    use App\Http\Requests;
    use App\Http\Requests\PermissionFormRequest;
    use App\Repositories\PermissionRepository;
    use Flash;
    use Illuminate\Http\Request;

    class PermissionController extends Controller
    {

        public function __construct(PermissionRepository $permissionRepository)
        {
            $this->middleware('auth');
            $this->permissionRepo = $permissionRepository;
        }


        /**
         * @param Request $request
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function index(Request $request)
        {

            $query  = $request->get('q');
            $order  = $request->get('sort','desc');
            $by     = $request->get('by','id');


            $permissions = $this->permissionRepo->getAll($query,$order,$by);

            $permissions->appends(['q' => $query,'sort'=>$order,'by'=>$by]);

            $sort = ($order=='desc')?'asc':'desc';


            return View('permission.index', compact('permissions','sort'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return View('permission.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(PermissionFormRequest $request)
        {

            try {

                $input = $request->all();
                $this->permissionRepo->create($input);

                Flash::success("Permission Successfully Created");

            } catch (Exception $e) {

                echo $e->getFile();
            }

            return View('permission.create');

        }

        /**
         * Display the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $permission = $this->permissionRepo->find($id);

            return View('permission.show',compact('permission'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $permission = $this->permissionRepo->find($id);
            return View('permission.edit', compact('permission'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function update(PermissionFormRequest $request, $id)
        {
            try {

                $permissionData = $request->all();

                $permissionData['slug'] = str_replace(' ', '.', strtolower($request->input('name')));
                $this->permissionRepo->update($id, $permissionData);

                Flash::success("Data updated Successfully");

                return redirect(route('permission.edit', ['id' => $id]));

            } catch (Exception $e) {

                Flash::error($e->getMessage());

            }
        }
        /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy(Request $request)
        {
            $ids = $request->all();

            try {

                if ($request->has('toDelete')) {

                    $this->permissionRepo->delete($ids);

                    Flash::success("Data deleted Successfully");

                } else {

                    Flash::error("Please check at least one to delete");
                }


            } catch (Exception $e) {

                Flash::error("Error in deleting data");
            }
            return redirect(route('permission.index'));
        }
    }
}
