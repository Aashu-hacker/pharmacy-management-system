<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $product_list = [
            (object)[
                'product_id' => 1,
                'product_name' => 'Aspirin',
                'strength' => '500mg'
            ],
            (object)[
                'product_id' => 2,
                'product_name' => 'Ibuprofen',
                'strength' => '200mg'
            ],
            (object)[
                'product_id' => 3,
                'product_name' => 'Paracetamol',
                'strength' => '650mg'
            ]
        ];

        // Static data for itemlist
        $itemlist = [
            // Tablets
            (object)[
                'product_id' => 1,
                'category_name' => 'Tablet',
                'product_name' => 'Aspirin',
                'strength' => '500mg',
                'expiry' => '2024-1-30',
                'batch' => '1123',
                'price' => 100,
                'discount' => 10,
                'image' => '/assets2/dist/img/products/product.png'
            ],
            (object)[
                'product_id' => 2,
                'category_name' => 'Tablet',
                'product_name' => 'Ibuprofen',
                'strength' => '200mg',
                'batch' => '134123',
                'expiry' => '2024-5-30',
                'price' => 160,
                'discount' => 10,
                'image' => '/assets2/dist/img/products/product.png'
            ],
            (object)[
                'product_id' => 3,
                'category_name' => 'Tablet',
                'product_name' => 'Paracetamol',
                'strength' => '650mg',
                'batch' => '123',
                'expiry' => '2024-5-30',
                'price' => 110,
                'discount' => 10,
                'image' => '/assets2/dist/img/products/product.png'
            ],
            (object)[
                'product_id' => 4,
                'category_name' => 'Tablet',
                'product_name' => 'Cetrizine',
                'strength' => '10mg',
                'batch' => '1433',
                'expiry' => '2024-5-30',
                'price' => 140,
                'discount' => 10,
                'image' => '/assets2/dist/img/products/product.png'
            ],
            (object)[
                'product_id' => 5,
                'category_name' => 'Tablet',
                'product_name' => 'Metformin',
                'strength' => '500mg',
                'batch' => '123',
                'expiry' => '2024-5-30',
                'price' => 170,
                'discount' => 10,
                'image' => '/assets2/dist/img/products/product.png'
            ],

            // Syrups
            (object)[
                'product_id' => 6,
                'category_name' => 'Syrup',
                'product_name' => 'Cough Syrup',
                'strength' => '100ml',
                'batch' => '112',
                'expiry' => '2024-5-30',
                'price' => 190,
                'discount' => 10,
                'image' => '/assets2/dist/img/products/syrup.jpg'
            ],
            (object)[
                'product_id' => 7,
                'category_name' => 'Syrup',
                'product_name' => 'Paracetamol Syrup',
                'strength' => '120mg/5ml',
                'batch' => '123',
                'expiry' => '2024-5-30',
                'price' => 198,
                'discount' => 10,
                'image' => '/assets2/dist/img/products/syrup.jpg'
            ],
            (object)[
                'product_id' => 8,
                'category_name' => 'Syrup',
                'product_name' => 'Antacid Syrup',
                'strength' => '150ml',
                'batch' => '22',
                'expiry' => '2024-5-30',
                'price' => 454,
                'discount' => 10,
                'image' => '/assets2/dist/img/products/syrup.jpg'
            ],
            (object)[
                'product_id' => 9,
                'category_name' => 'Syrup',
                'product_name' => 'Nutritional Syrup',
                'strength' => '200ml',
                'batch' => '11',
                'expiry' => '2024-5-30',
                'price' => 545,
                'discount' => 10,
                'image' => '/assets2/dist/img/products/syrup.jpg'
            ],
            (object)[
                'product_id' => 10,
                'category_name' => 'Syrup',
                'product_name' => 'Laxative Syrup',
                'strength' => '150ml',
                'batch' => '100',
                'expiry' => '2024-5-30',
                'price' => 654,
                'discount' => 10,
                'image' => '/assets2/dist/img/products/syrup.jpg'
            ]
        ];

        $customer_list = [
            (object)[
                'customer_id' => 101,
                'customer_name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'phone' => '555-1234',
                'address' => '123 Main Street, City A'
            ],
            (object)[
                'customer_id' => 102,
                'customer_name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'phone' => '555-5678',
                'address' => '456 Elm Street, City B'
            ],
            (object)[
                'customer_id' => 103,
                'customer_name' => 'Mike Johnson',
                'email' => 'mikejohnson@example.com',
                'phone' => '555-9012',
                'address' => '789 Oak Street, City C'
            ]
        ];


        $categories = CategoryModel::whereNull('is_delete')->get();
        return view('pages.pos-invoice', [
            'categorylist' => $categories,
            'product_list' => $product_list,
            'itemlist' => $itemlist,
            'customer_list' => $customer_list
        ]);
    }

    public function list()
    {
        $invoices = Invoice::whereNull('is_delete')->get();
        return view('pages.pos-invoice-list', ['invoices' => $invoices]);
    }
    public function deleteInvoice($id){
        $invoice = Invoice::where('id', $id)->first();
        if($invoice){
            $invoice->is_delete = 1;
            $invoice->save();
            return redirect()->route('invoices.list')->with('success', 'Invoice deleted successfully');
        }else{
            return redirect()->route('invoices.list')->with('error', 'Invoice not found');
        }
    }

    public function printInvoice($id)
    {
        $invoice = Invoice::with('items')->where('id', $id)->first();
        return view('pages.pos-invoice-print', ['invoice' => $invoice]);
    }


    public function saveInvoice(Request $request)
    {   
        // Validate the request data
        $validatedData = $request->validate([
            'customer_id' => 'nullable',
            'total_discount' => 'numeric|min:0',
            'total_vat' => 'numeric|min:0',
            'grand_total' => 'required|numeric|min:0',
            'items' => 'required|array',
            'items.*.product_id' => 'required',
            'items.*.product_name' => 'required|string',
            'items.*.quantity' => 'required|numeric|min:0',
            'items.*.price' => 'required|numeric|min:0',
            'items.*.discount' => 'required|numeric|min:0',
            'items.*.total' => 'required|numeric|min:0'
        ]);
    
        // Transaction to save invoice and items
        return DB::transaction(function () use ($validatedData, $request) {
            // Save Invoice
            $invoice = Invoice::create([
                'customer_id' => $validatedData['customer_id'] ?? null,
                'total_discount' => $request->total_discount,
                'total_vat' => $request->total_vat,
                'grand_total' => $request->grand_total,
            ]);
    
            // Save Invoice Items
            foreach ($validatedData['items'] as $item) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $item['product_id'],
                    'product_name' => $item['product_name'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'discount' => $item['discount'],
                    'total' => $item['total']
                ]);
            }
    
            return response()->json(['success' => true, 'message' => 'Invoice saved successfully!'], 200);
        });
    }
    
}
