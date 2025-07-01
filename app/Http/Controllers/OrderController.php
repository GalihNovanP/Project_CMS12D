<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index', [
            'orders' => Order::all()
        ]);
    }

    public function create()
    {
        return view('order.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_order' => 'required|date',
            'jumlah_order' => 'required|integer',
        ]);

        try {
            Order::create([
                'tanggal_order' => $request->input('tanggal_order'),
                'jumlah_order' => $request->input('jumlah_order'),
            ]);

            return redirect()->route('order.index')->with('success', 'Order berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('order.index')->with('error', 'Gagal menambahkan order: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $order = Order::findOrFail($id);
            return view('order.show', compact('order'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('order.index')->with('error', 'Order tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $order = Order::findOrFail($id);
            return view('order.edit', compact('order'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('order.index')->with('error', 'Order tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_order' => 'required|date',
            'jumlah_order' => 'required|integer',
        ]);

        try {
            $order = Order::findOrFail($id);

            $order->update([
                'tanggal_order' => $request->input('tanggal_order'),
                'jumlah_order' => $request->input('jumlah_order'),
            ]);

            return redirect()->route('order.show', $id)->with('success', 'Order berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('order.index')->with('error', 'Order tidak ditemukan.');
        } catch (\Exception $e) {
            return redirect()->route('order.index')->with('error', 'Gagal memperbarui order: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $order = Order::findOrFail($id);
            return view('order.delete', compact('order'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('order.index')->with('error', 'Order tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();

            return redirect()->route('order.index')->with('success', 'Order berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('order.index')->with('error', 'Order tidak ditemukan.');
        } catch (\Exception $e) {
            return redirect()->route('order.index')->with('error', 'Gagal menghapus order: ' . $e->getMessage());
        }
    }
}
