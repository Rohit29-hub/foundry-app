@extends('layout2')

@section('main')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Add New Order</h2>
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="order-number" class="block text-gray-700 font-medium mb-2">Order Number</label>
                    <input type="text" class="w-full border border-gray-300 p-2 rounded-md" id="order-number" name="order_number" placeholder="Order Number" required>
                </div>
            </div>
            <div class="mt-4">
                <h3 class="text-lg font-semibold mb-2">Items</h3>
                <div id="items">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4 item-row">
                        <div>
                            <label for="itemName" class="block text-gray-700 font-medium mb-2">Item Name</label>
                            <select name="items[0][name]" class="w-full border border-gray-300 p-2 rounded-md">
                                <option value="Transistors">Transistors</option>
                                <option value="MOSFETS">MOSFETS</option>
                                <option value="Rectifiers">Rectifiers</option>
                                <option value="Resistors">Resistors</option>
                                <option value="Capacitors">Capacitors</option>
                            </select>
                        </div>
                        <div>
                            <label for="quantity" class="block text-gray-700 font-medium mb-2">Quantity</label>
                            <input type="number" name="items[0][quantity]" class="w-full border border-gray-300 p-2 rounded-md" placeholder="Quantity" required>
                        </div>
                    </div>
                </div>
                <button type="button" id="add-item" class="btn btn-secondary mt-2">Add Another Item</button>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn btn-primary mb-4 mt-2">Submit</button>
            </div>
        </form>
    </div>

    <div class="mt-10">
        <h2 class="text-2xl font-semibold">All Orders</h2>
        <div class="overflow-x-auto mt-2 rounded-lg">
            <table class="min-w-full bg-white border rounded-lg border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border-b">Order Number</th>
                        <th class="py-2 px-4 border-b">Item Name</th>
                        <th class="py-2 px-4 border-b">Quantity</th>
                        <th class="py-2 px-4 border-b">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    @foreach($order->items as $item)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $loop->first ? $order->order_number : '' }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->quantity }}</td>
                        <td class="py-2 px-4 border-b">{{ $loop->first ? $order->created_at->format('Y-m-d') : '' }}</td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    let itemIndex = 1;
    document.getElementById('add-item').addEventListener('click', function() {
        let newItemRow = `
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4 item-row">
                <div>
                    <label for="itemName" class="block text-gray-700 font-medium mb-2">Item Name</label>
                    <select name="items[${itemIndex}][name]" class="w-full border border-gray-300 p-2 rounded-md">
                        <option value="transistors">Transistors</option>
                        <option value="mosfets">MOSFETS</option>
                        <option value="rectifiers">Rectifiers</option>
                        <option value="resistors">Resistors</option>
                        <option value="capacitors">Capacitors</option>
                    </select>
                </div>
                <div>
                    <label for="quantity" class="block text-gray-700 font-medium mb-2">Quantity</label>
                    <input type="number" name="items[${itemIndex}][quantity]" class="w-full border border-gray-300 p-2 rounded-md" placeholder="Quantity" required>
                </div>
            </div>
        `;
        document.getElementById('items').insertAdjacentHTML('beforeend', newItemRow);
        itemIndex++;
    });
</script>
@endsection
