<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrderDataTable $dataTable)
    {
        $statusOrder = config('order_status.order_status_admin');
        return $dataTable->render('admin.order.index', compact('statusOrder'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with('orderProducts')->findOrFail($id);

        return view('admin.order.show', compact('order'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);

        // delete order products
        $order->orderProducts()->delete();


        $order->delete();

        return response(['status' => 'success', 'message' => 'Deleted successfully!']);
    }

    public function changeOrderStatus(Request $request)
    {
        $order = Order::findOrFail($request->input('id'));

        $order->order_status = $request->input('status');
        $order->save();

        return response(['status' => 'success', 'message' => 'Cập nhập đơn hàng thành công']);
    }
    public function changePaymentStatus(Request $request)
    {
        $order = Order::findOrFail($request->input('id'));

        $order->update(
          [
              'payment_status' => $request->input('status') == 'true' ? 1 : 0
          ]
        );

        return response(['status' => 'success', 'message' => 'Cập nhập trạng thái thanh toán thành công']);
    }
}
