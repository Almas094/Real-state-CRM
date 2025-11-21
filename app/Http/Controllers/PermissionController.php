<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Validator;
use App\Models\Role;
use App\Models\Menu;
use App\Models\SubMenu;

class PermissionController extends Controller
{
  
    public function menuView()
    {
        $role = Role::get();
        return view('superadmin.sidemenu.menu-list', ['role' => $role]);
    }

    public function menuList()
    {
        $query = Menu::with(['subMenus', 'role'])->get();

        return DataTables::of($query)
            ->addColumn('role_name', function ($menu) {
                return $menu->role->name;
            })
            ->addColumn('menu_name', function ($menu) {
                return $menu->name;
            })
            ->addColumn('sub_menus', function ($menu) {
                $subMenus = $menu->subMenus->pluck('name');
                if ($subMenus->isEmpty()) {
                    return 'Not Available';
                }
                $list = '<ol>';
                foreach ($subMenus as $subMenu) {
                    $list .= '<li>' . e($subMenu) . '</li>';
                }
                $list .= '</ol>';
                return $list;
            })
            ->addColumn('sorting_index', function ($menu) {
                return $menu->sorting_index;
            })
            ->addColumn('status', function ($menu) {
                $statusClass = $menu->status === 'active' ? 'text-success' : 'text-warning';
                return '<span class="' . $statusClass . '">' . ucfirst($menu->status) . '</span>';
            })
            ->addColumn('created_at', function ($menu) {
                return date('d/m/Y', strtotime($menu->created_at));
            })
            ->addColumn('action', function ($menu) {
                return '<button class="btn btn-primary edit-btn" data-id="' . $menu->id . '">
                            <i class="fas fa-pencil-alt"></i>
                        </button>';
            })
            ->rawColumns(['role_name', 'sub_menus', 'status', 'action'])
            ->make(true);
    }

    public function menuStore(Request $request)
    {
        $rules = [
            'role_id' => 'required|exists:roles,id',
            'menu_name' => 'required|string|max:255',
            'icon_class_name' => 'required',
            'status' => 'required',
            'have_sub_menu' => 'required|in:Yes,No',
        ];
        
        if ($request->input('have_sub_menu') === 'No') {
            $rules['route_name'] = 'required|string|max:255';
        } else {
            $rules['route_name'] = 'nullable';
        }
        
        $errors = [];
        foreach ($rules as $field => $rule) {
            $validator = Validator::make($request->only($field), [$field => $rule]);
            if ($validator->fails()) {
                $errors[$field] = $validator->errors()->first($field);
                break;
            }
        }
        
        if (!empty($errors)) {
            return response()->json(['errors' => $errors], 422);
        }
  
        $menu = Menu::create([
            'role_id' => $request->role_id,
            'name' => $request->menu_name,
            'route_name' => $request->route_name,
            'icon_class_name' => $request->icon_class_name,
            'status' => $request->status,
            'have_submenu' => $request->have_sub_menu,
            'sorting_index' => Menu::max('sorting_index') + 1 
        ]);

        if ($request->have_sub_menu === 'Yes' && !empty($request->sub_menus)) {
            foreach ($request->sub_menus as $subMenuData) {
                SubMenu::create([
                    'menu_id' => $menu->id,
                    'name' => $subMenuData['name'],
                    'route_name' => $subMenuData['route_name'],
                    'status' => $subMenuData['submenu_status'],
                ]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Menu added successfully']);
    }

    public function menuEdit($id)
    {
        $menu = Menu::with('subMenus')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $menu->id,
                'role_id' => $menu->role_id,
                'menu_name' => $menu->name,
                'route_name' => $menu->route_name,
                'icon_class_name' => $menu->icon_class_name,
                'sorting_index' => $menu->sorting_index,
                'status' => $menu->status,
                'have_sub_menu' => $menu->have_submenu,
                'sub_menus' => $menu->subMenus->map(function ($subMenu) {
                    return [
                        'id' => $subMenu->id,
                        'name' => $subMenu->name,
                        'route_name' => $subMenu->route_name,
                        'submenu_status' => $subMenu->status,
                    ];
                })
            ]
        ]);
    }

    public function menuUpdate(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'role_id' => 'required|exists:roles,id',
            'menu_name' => 'required|string|max:255',
            'route_name' => 'nullable|string|max:255',
            'sorting_index' => 'required',
            'status' => 'required|in:active,inactive',
            'icon_class_name' => 'required|string|max:255',
            'have_sub_menu' => 'required|in:Yes,No',
        ]);


        $menu = Menu::findOrFail($request->menu_id);
        $menu->update($request->only(['role_id', 'menu_name', 'route_name', 'status',  'sorting_index', 'icon_class_name', 'have_submenu']));

        $menu->subMenus()->delete();
        if ($request->have_sub_menu === 'Yes') {
            $subMenus = [];
            foreach ($request->sub_menu_name as $index => $name) {
                if (!empty($name)) {
                $subMenus[] = [
                    'name' => $name,
                    'route_name' => $request->sub_menu_route_name[$index],
                    'status' => $request->submenu_status[$index],
                ];
              }
            }
            foreach ($subMenus as $subMenu) {
                $menu->subMenus()->create($subMenu);
            }
        }

        return response()->json(['success' => true, 'message' => 'Menu updated successfully.']);
    }

    public function submenuDelete(Request $request)
    {
        $SubMenu = SubMenu::where('id', $request->id)->delete();

        return response()->json(['success' => true, 'message' => 'Submenu delete successfully']);
    }

}
