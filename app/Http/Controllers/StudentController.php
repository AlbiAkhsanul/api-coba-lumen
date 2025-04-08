<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function index()
    {
        $students = Student::all();

        return response()->json([
            'success' => true,
            'message' => 'Students Data',
            'data' => $students
        ], 200);
    }

    function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'npm' => 'required',
            'year' => 'required',
            'ipk' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'All Data Is Required',
                'data' => $validator->errors()
            ], 400);
        } else {
            $student = Student::create([
                'name' => $request->input('name'),
                'npm' => $request->input('npm'),
                'year' => $request->input('year'),
                'ipk' => $request->input('ipk'),
            ]);

            if ($student) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Created',
                    'data' => $student
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed To Create Data',
                    'data' => 'Error'
                ], 500);
            }
        }
    }

    function show($id)
    {
        $student = Student::find($id);

        if ($student) {
            return response()->json([
                'success' => true,
                'message' => 'Student Data',
                'data' => $student
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Student Data Not Found',
                'data' => Null
            ], 400);
        }
    }

    function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'npm' => 'required',
            'year' => 'required',
            'ipk' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'All Data Is Required',
                'data' => $validator->errors()
            ], 400);
        } else {
            $student = Student::whereId($id)->update([
                'name' => $request->input('name'),
                'npm' => $request->input('npm'),
                'year' => $request->input('year'),
                'ipk' => $request->input('ipk'),
            ]);

            if ($student) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Updated',
                    'data' => $student
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed To Update Data',
                    'data' => 'Error'
                ], 500);
            }
        }
    }

    function delete($id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Deleted',
                'data' => 'Deleted'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Not Found',
                'data' => Null
            ], 400);
        }
    }
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     //
    // }
}
