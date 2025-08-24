@extends('admin.index')

@section('content')


<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <h1>Permissions</h1>
      <div class="flex justify-end">
        <a href="{{route('createpermission')}}"class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"> Create Permission</a>

  
</div>
      
      <br>
        <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   Permission name
                </th>
              
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                
            </tr>
        </thead>
        <tbody>
          @foreach($Permissions as $Permission)
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{$Permission->name}}
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('permissionEdit',$Permission->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>||
                    <a href="{{route('permissionDelete',$Permission->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                 
                  </td>
                 
              
               
            </tr>

            @endforeach
           
        </tbody>
    </table>
</div>

@endsection