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
                    name
                </th>

                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Role
                </th>
                <th scope="col" class="px-6 py-3">
                    Permission
                </th>
              
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                
            </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{$user->name}}
                </th>
            <td>{{$user->email}}</td>
            <td>
            <a href="{{route('usersetrole',$user->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-[3px] px-[6px] text-xs border border-blue-700 rounded">
                 Role
                 </a>
            </td>
            <td>
            <a href="{{route('usersetpermission',$user->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-[3px] px-[6px] text-xs border border-blue-700 rounded">
                 Permission
                 </a>
            </td>
                <td class="px-6 py-4">
                    <a href="{{route('userEdit',$user->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>||
                    <a href="{{route('userDelete',$user->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                 
                  </td>
                 
              
               
            </tr>

            @endforeach
           
        </tbody>
    </table>
</div>

@endsection