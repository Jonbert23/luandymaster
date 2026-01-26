<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        return view('business.dashboard');
    }

    // Analytics
    public function analytics()
    {
        return view('business.analytics.index');
    }

    // Orders
    public function ordersIndex()
    {
        return view('business.orders.index');
    }

    public function ordersCreate()
    {
        return view('business.orders.create');
    }

    public function ordersEdit($id)
    {
        return view('business.orders.edit', ['id' => $id]);
    }

    public function ordersView($id)
    {
        return view('business.orders.view', ['id' => $id]);
    }

    // POS
    public function posIndex()
    {
        return view('business.pos.index');
    }

    // Branches
    public function branchesIndex()
    {
        return view('business.branches.index');
    }

    public function branchesCreate()
    {
        return view('business.branches.create');
    }

    public function branchesEdit($id)
    {
        return view('business.branches.edit', ['id' => $id]);
    }

    public function branchesView($id)
    {
        return view('business.branches.view', ['id' => $id]);
    }

    // Staff
    public function staffIndex()
    {
        return view('business.staff.index');
    }

    public function staffCreate()
    {
        return view('business.staff.create');
    }

    public function staffEdit($id)
    {
        return view('business.staff.edit', ['id' => $id]);
    }

    public function staffView($id)
    {
        return view('business.staff.view', ['id' => $id]);
    }

    // Services
    public function servicesIndex()
    {
        return view('business.services.index');
    }

    public function servicesCreate()
    {
        return view('business.services.create');
    }

    public function servicesEdit($id)
    {
        return view('business.services.edit', ['id' => $id]);
    }

    public function servicesView($id)
    {
        return view('business.services.view', ['id' => $id]);
    }

    // Products
    public function productsIndex()
    {
        return view('business.products.index');
    }

    public function productsCreate()
    {
        return view('business.products.create');
    }

    public function productsEdit($id)
    {
        return view('business.products.edit', ['id' => $id]);
    }

    public function productsView($id)
    {
        return view('business.products.view', ['id' => $id]);
    }

    // Inventory
    public function inventoryIndex()
    {
        return view('business.inventory.index');
    }

    public function inventoryCreate()
    {
        return view('business.inventory.create');
    }

    public function inventoryEdit($id)
    {
        return view('business.inventory.edit', ['id' => $id]);
    }

    public function inventoryView($id)
    {
        return view('business.inventory.view', ['id' => $id]);
    }

    // Sales
    public function salesIndex()
    {
        return view('business.sales.index');
    }

    // Expenses
    public function expensesIndex()
    {
        return view('business.expenses.index');
    }

    public function expensesCreate()
    {
        return view('business.expenses.create');
    }

    public function expensesEdit($id)
    {
        return view('business.expenses.edit', ['id' => $id]);
    }

    public function expensesView($id)
    {
        return view('business.expenses.view', ['id' => $id]);
    }

    // Settings
    public function settings()
    {
        return view('business.settings.index');
    }
}

