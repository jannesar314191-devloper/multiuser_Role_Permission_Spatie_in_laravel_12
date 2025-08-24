@extends('admin.index')

@section('content')


<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <h1>Roles</h1>
      <div class="flex justify-end">
        <a href="{{route('createRole')}}"class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"> Create Role</a>

  
    </div>
      
   
        <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   Role name
                </th>

                <th scope="col" class="px-6 py-3">
                    Permissions
                </th>
              
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                
            </tr>
        </thead>
        <tbody>
          @foreach($roles as $role)
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{$role->name}}
                </th>
                <td>

               @foreach($role->permissions as $rolepermission)
                <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-[3px] px-[6px] text-xs border border-blue-700 rounded">
                 {{$rolepermission->name}}
                 </a>|

                 @endforeach


  
   

                </td>
                <td class="px-6 py-4">
                    <a href="{{route('roleEdit',$role->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>||
                    <a href="{{route('roleDelete',$role->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                 
                  </td>
                 
              
               
            </tr>

            @endforeach
           
        </tbody>
    </table>
</div>

@endsection