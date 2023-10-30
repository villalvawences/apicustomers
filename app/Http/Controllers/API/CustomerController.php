<?php

namespace App\Http\Controllers\API;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Http\Requests\SaveCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    public function store(SaveCustomerRequest $request)
    {
        return (new CustomerResource(Customer::create($request->all())))
            ->additional(['msg' => 'Customer guardado correctamente']);
    }

    public function searchCustomer(Request $request)
    {
        $search = $request->input('search');

        $customers = Customer::where('name', 'like', "%$search%")
            ->where('status', 'A')
            ->where('deleted', 0)
            ->orWhere('dni', $search)
            ->get();

        return $customers;

        if (count($customers) > 0) {
            Log::channel('bitacora')->info('Operación registrada', [
                'request' => $request->all(),
                'customers' => $customers,
                'success' => true,
                'ip_client' => $request->getClientIp()
            ]);

            return response()->json([
                'customers' => $customers,
                'success' => true,
                'ip_client' => $request->getClientIp()
            ]);
        } else {
            Log::channel('bitacora')->info('Operación registrada', [
                'success' => false,
                'ip_client' => $request->getClientIp()
            ]);

            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function destroy(Request $request, Customer $customer)
    {
        $customer = Customer::find($customer->id);

        if (!$customer) {

            Log::channel('bitacora')->info('Operación registrada', [
                'customers' => $customer,
                'success' => false,
                'ip_client' => $request->getClientIp()
            ]);

            return response()->json([
                'mensaje' => 'Cliente no encontrado',
                'success' => false
            ], 404);
        }

        $customer->update([
            'deleted' => true
        ]);

        Log::channel('bitacora')->info('Operación registrada', [
            'customers' => $customer,
            'success' => true,
            'ip_client' => $request->getClientIp()
        ]);

        return (new CustomerResource($customer))
            ->additional(['msg' => 'Customer eliminado correctamente']);
    }
}
