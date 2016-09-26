<?php

namespace App\Http\Controllers {

    use App\Http\Requests;
    use App\Http\Requests\UserGroupFormRequest;
    use App\Repositories\UserGroupRepository;
    use App\User;
    use Auth;
    use Flash;
    use Hash;
    use Redirect;
    use Illuminate\Http\Request;
    use Mockery\CountValidator\Exception;

    class UserGroupController extends Controller
    {
        public function __construct(UserGroupRepository $userGroupRepository)
        {
            $this->middleware('auth');
            $this->userGroupRepo = $userGroupRepository;
        }


        /**
         * @param Request $request
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function index(Request $request)
        {

            $query = $request->get('q');
            $order = $request->get('sort', 'desc');
            $by = $request->get('by', 'id');

            $results = $this->userGroupRepo->getAll($query, $order, $by);
            $results->appends(['q' => $query, 'sort' => $order, 'by' => $by]);

            $sort = ($order == 'desc') ? 'asc' : 'desc';

            return View('user-group.index', compact('results', 'sort'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {

            $roles = $this->userGroupRepo->getRoles();

            $permissions = $this->userGroupRepo->getPermissions();

            return View('user-group.create', compact('roles', 'permissions'));
        }


        /**
         * @param UserGroupFormRequest $request
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
         */
        public function store(UserGroupFormRequest $request)
        {

            try {

                $input = $request->all();
                $this->userGroupRepo->save($input);

                Flash::success("Data created Successfully");

                return redirect(route('user.group.create'));

            } catch (Exception $e) {

                echo $e->getFile();
            }

            return View('user-group.create');

        }

        /**
         * Display the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $row = $this->userGroupRepo->find($id);

            return View('user-group.show', compact('row'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $user = User::find($id);

            $userRoles = $this->userGroupRepo->userRoles($user);
            $userPermissions = $this->userGroupRepo->userPermissions($user);

            $roles = $this->userGroupRepo->getRoles();
            $permissions = $this->userGroupRepo->getPermissions();

            return View('user-group.edit', compact('user', 'roles', 'permissions', 'userRoles', 'userPermissions'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function update(UserGroupFormRequest $request, $id)
        {
            try {

                $userData = $request->all();
                $this->userGroupRepo->update($id, $userData);

                Flash::success("Data updated Successfully");

                return redirect(route('user.group.edit', ['id' => $id]));

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

                    $this->userGroupRepo->delete($ids['toDelete']);

                    Flash::success("Data deleted Successfully");

                } else {

                    Flash::error("Please check at least one to delete");
                }


            } catch (Exception $e) {

                Flash::error("Error in deleting data");
            }

            return redirect(route('user.group.index'));
        }
    }
}
