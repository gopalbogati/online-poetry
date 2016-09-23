<?php

namespace App\Http\Controllers {

    use App\Http\Controllers\Controller;
    use App\Http\Requests;
    use App\Http\Requests\RoleFormRequest;
    use App\Repositories\RoleRepository;
    use Flash;
    use Illuminate\Http\Request;

    class RoleController extends Controller
    {

        public function __construct(RoleRepository $RoleRepository)
        {
            $this->middleware('auth');
            $this->roleRepo = $RoleRepository;
        }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request)
        {
            $query  = $request->get('q');
            $order  = $request->get('sort','desc');
            $by     = $request->get('key','id');
            $roles = $this->roleRepo->findAll($query,$order,$by);
            $roles->appends(['q' => $query]);

            $sort = ($order=='desc')?'asc':'desc';

            return View('role.index', compact('roles','sort'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return View('role.create');
        }


        /**
         * @param RoleFormRequest $request
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function store(RoleFormRequest $request)
        {

            try {

                $input = $request->all();
                $this->roleRepo->create($input);

                Flash::success("Role Successfully Created");

            } catch (Exception $e) {

                Flash::error($e->getMessage());
            }

            return View('role.create');

        }

        /**
         * Display the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $role = $this->roleRepo->find($id);
            return View('role.show', compact('role'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $role = $this->roleRepo->find($id);
            return View('role.edit', compact('role'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function update(RoleFormRequest $request, $id)
        {
            try {

                $roleData = $request->all();

                $this->roleRepo->update($id,$roleData);

                Flash::success("Data updated Successfully");

                return redirect(route('role.edit',['id'=>$id]));

            } catch (Exception $e) {

                Flash::error($e->getMessage());

            }
        }


        /**
         * @param Request $request
         * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
         */
        public function destroy(Request $request)
        {

            $ids = $request->all();

            try {

                if ($request->has('toDelete')) {

                    $this->roleRepo->delete($ids);

                    Flash::success("Data deleted Successfully");

                } else {

                    Flash::error("Please check at least one to delete");
                }


            } catch (Exception $e) {

                Flash::error($e->getMessage());
            }
            return redirect(route('role.index'));
        }
    }
}
