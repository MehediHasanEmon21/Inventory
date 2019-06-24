<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//////  ==================== POS ROUTE IS HERE =======================  //////
Route::get('pos','PosController@index')->name('pos.index');


//////  ==================== EMPLOYEE ROUTE IS HERE =======================  //////

Route::get('all-employee','EmployeeController@index')->name('employee.index');
Route::get('add-employee','EmployeeController@create')->name('employee.create');
Route::post('add-employee','EmployeeController@store')->name('employee.store');
Route::get('view-employee/{id}','EmployeeController@show')->name('employee.show');
Route::get('delete-employee/{id}','EmployeeController@destroy')->name('employee.destroy');
Route::get('edit-employee/{id}','EmployeeController@edit')->name('employee.edit');
Route::post('update-employee/{id}','EmployeeController@update')->name('employee.update');


//////  ==== CUSTOMER ROUTE IS HERE ====  //////

Route::get('all-customer','CustomerController@index')->name('customer.index');
Route::get('add-customer','CustomerController@create')->name('customer.create');
Route::post('add-customer','CustomerController@store')->name('customer.store');
Route::get('view-customer/{id}','CustomerController@show')->name('customer.show');
Route::get('edit-customer/{id}','CustomerController@edit')->name('customer.edit');
Route::post('update-customer/{id}','CustomerController@update')->name('customer.update');
Route::get('delete-customer/{id}','CustomerController@destroy')->name('customer.destroy');


//////  ====EMPLOYEE ROUTE IS HERE====  //////

Route::get('all-supplier','SupplierController@index')->name('supplier.index');
Route::get('add-supplier','SupplierController@create')->name('supplier.create');
Route::post('add-supplier','SupplierController@store')->name('supplier.store');
Route::get('view-supplier/{id}','SupplierController@show')->name('supplier.show');
Route::get('edit-supplier/{id}','SupplierController@edit')->name('supplier.edit');
Route::post('update-supplier/{id}','SupplierController@update')->name('supplier.update');
Route::get('delete-supplier/{id}','SupplierController@destroy')->name('supplier.destroy');

//////  ====EMPLOYEE ROUTE IS HERE====  //////

Route::get('all-category','CategoryController@index')->name('category.index');
Route::get('add-category','CategoryController@create')->name('category.create');
Route::post('add-category','CategoryController@store')->name('category.store');
Route::get('edit-category/{id}','CategoryController@edit')->name('category.edit');
Route::post('update-category/{id}','CategoryController@update')->name('category.update');
Route::get('delete-category/{id}','CategoryController@destroy')->name('category.destroy');


//////  ====POODUCT ROUTE IS HERE====  //////
Route::get('all-product','ProductController@index')->name('product.index');
Route::get('add-product','ProductController@create')->name('product.create');
Route::post('add-product','ProductController@store')->name('product.store');
Route::get('view-product/{id}','ProductController@show')->name('product.show');
Route::get('edit-product/{id}','ProductController@edit')->name('product.edit');
Route::post('update-product/{id}','ProductController@update')->name('product.update');
Route::get('delete-product/{id}','ProductController@destroy')->name('product.destroy');

//////  ====IMPORT-EXPORT ROUTE IS HERE====  //////
Route::get('import-product','ProductController@import_product')->name('import.product');
Route::get('export','ProductController@export')->name('export');
Route::post('import','ProductController@import')->name('import');

//////  ====EXPENSE ROUTE IS HERE====  //////
Route::get('all-today-expense','ExpenseController@index')->name('today-expense.index');
Route::get('add-expense','ExpenseController@create')->name('expense.create');
Route::post('add-expense','ExpenseController@store')->name('today-expense.store');
Route::get('edit-expense/{id}','ExpenseController@edit')->name('expense.edit');
Route::post('update-expense/{id}','ExpenseController@update')->name('expense.update');
Route::get('delete-expense/{id}','ExpenseController@destroy')->name('expense.destroy');

Route::get('monthly-expense','ExpenseController@monthly_expense')->name('monthly.expense');
Route::get('yearly-expense','ExpenseController@yearly_expense')->name('yearly.expense');

//////  ====MONTHLY ROUTE IS HERE====  //////

Route::get('january-expense','ExpenseController@january_expense')->name('january.expense');
Route::get('february-expense','ExpenseController@february_expense')->name('february.expense');
Route::get('march-expense','ExpenseController@march_expense')->name('march.expense');
Route::get('april-expense','ExpenseController@april_expense')->name('april.expense');
Route::get('may-expense','ExpenseController@may_expense')->name('may.expense');
Route::get('june-expense','ExpenseController@june_expense')->name('june.expense');
Route::get('july-expense','ExpenseController@july_expense')->name('july.expense');
Route::get('august-expense','ExpenseController@august_expense')->name('august.expense');
Route::get('september-expense','ExpenseController@september_expense')->name('september.expense');
Route::get('october-expense','ExpenseController@october_expense')->name('october.expense');
Route::get('november-expense','ExpenseController@november_expense')->name('november.expense');
Route::get('december-expense','ExpenseController@december_expense')->name('december.expense');


//////  ====ATTENDANCE ROUTE IS HERE====  //////
Route::get('take-attendance','AttendanceController@take_attendance')->name('take.attendance');
Route::post('add-attendance','AttendanceController@store_attendance')->name('attendance.store');
Route::get('all-attendance','AttendanceController@all_attendance')->name('all.attendance');
Route::get('edit-attendance/{edit_date}','AttendanceController@edit_attendance')->name('attendance.edit');
Route::post('update-attendance','AttendanceController@update_attendance')->name('attendance.update');
Route::get('show-attendance/{edit_date}','AttendanceController@show_attendance')->name('attendance.show');


//////  ====CART ROUTE IS HERE====  //////
Route::post('add-cart','CartController@add_cart')->name('cart.add');
Route::post('update-cart/{rowId}','CartController@update_cart')->name('cart.update');
Route::get('delete-cart/{rowId}','CartController@delete_cart')->name('cart.delete');

//////  ====INVOICE ROUTE IS HERE====  //////
Route::post('invoice','InvoiceController@index')->name('invoice.index');
Route::post('final-invoice','InvoiceController@final_invoice')->name('final.invoice');

//////  ====ORDER ROUTE IS HERE====  //////

Route::get('pending/order','OrderController@index')->name('pending.index');
Route::get('view/order/{id}','OrderController@view_order')->name('view.order');
Route::get('confirm-order/{id}','OrderController@confirm_order')->name('confirm.order');
Route::get('success-order','OrderController@success_order')->name('success.order');

