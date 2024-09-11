@extends('layout2')

@section('main')
<div class="container">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Add New Entry</h2>
        <form method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="itemName" class="block text-gray-700 font-medium mb-2">Order Name</label>
                    <input type="text" class="w-full border border-gray-300 p-2 rounded-md" id="itemName" name="itemName" placeholder="Enter item name" required>
                </div>
                <div>
                    <label for="quantity" class="block text-gray-700 font-medium mb-2">Quantity</label>
                    <input type="number" class="w-full border border-gray-300 p-2 rounded-md" id="quantity" name="quantity" placeholder="Enter quantity" required>
                </div>
                <div>
                    <label for="category" class="block text-gray-700 font-medium mb-2">Category</label>
                    <select class="w-full border border-gray-300 p-2 rounded-md" id="category" name="category" required>
                        <option value="Casting">Casting</option>
                        <option value="Consumable">Consumable</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                
            </div>
            <div class="mt-6">
                <button type="button" class=" btn btn-primary mb-4 mt-2">Save Entry</button>

            </div>
        </form>
    </div>

    <div class="mt-10">
        <h2 class="text-2xl font-semibold">All Entries</h2>
        <div class="overflow-x-auto mt-5">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border-b">Item No</th>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Quantity</th>
                        <th class="py-2 px-4 border-b">Category</th>
                        <th class="py-2 px-4 border-b">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b">1</td>
                        <td class="py-2 px-4 border-b">Nails</td>
                        <td class="py-2 px-4 border-b">200</td>
                        <td class="py-2 px-4 border-b">Casting</td>
                        <td class="py-2 px-4 border-b">2024-08-22</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b">2</td>
                        <td class="py-2 px-4 border-b">Woods</td>
                        <td class="py-2 px-4 border-b">120</td>
                        <td class="py-2 px-4 border-b">Casting</td>
                        <td class="py-2 px-4 border-b">2024-08-20</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b">3</td>
                        <td class="py-2 px-4 border-b">Sand Paper</td>
                        <td class="py-2 px-4 border-b">50</td>
                        <td class="py-2 px-4 border-b">Consumable</td>
                        <td class="py-2 px-4 border-b">2024-08-02</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
