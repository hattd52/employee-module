<?php namespace Modules\EmployeeDemo\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('employee_demo::dashboard.name'), function (Group $group) {
            $group->weight(0);
            $group->hideHeading();

            $group->item(trans('employee_demo::dashboard.name'), function (Item $item) {
                $item->icon('fa fa-dashboard');
                $item->route('dashboard.index');
                $item->isActiveWhen(route('employee_demo.index', null, false));
                $item->authorize(
                    $this->auth->hasAccess('employee_demo.index')
                );
            });
        });

        return $menu;
    }
}
