@extends('admin.index')

@section('content')


<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <h1>{{$user->name}} : Roles</h1>
      <div class="flex justify-end">
        <a href="{{route('createuser')}}"class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"> Create Role</a>

  
    </div>
      
   
        <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
            <tr>
            <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3">
                    Role
                </th>

              
                
            </tr>
        </thead>
        <tbody>
         
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{$user->name}}
                </th>
            <td>
              @foreach($user->roles as $userrole)
            <a href="{{route('usersetrole',$user->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-[3px] px-[6px] text-xs border border-blue-700 rounded">
                 {{$userrole->name}}
                 </a>|
                 @endforeach
            </td>
          
            
                 
              
               
            </tr>

       
           
        </tbody>
    </table>

    <form class="max-w-sm mx-auto" action="{{route('storeusersetrole',$user->id)}}" method="post">
  @csrf
  <h1>create Role</h1>
 

  <style>
  select[multiple] {
    scrollbar-width: thin;
    scrollbar-color: #cbd5e1 transparent;
  }

  select[multiple] option {
    padding: 0.5rem;
    font-size: 0.875rem;
    transition: background-color 0.2s ease, color 0.2s ease;
    user-select: none;
  }

  select[multiple] option:hover {
    background-color: #eff6ff;
    color: #1e3a8a;
  }

  select[multiple] option:checked {
    background-color: #2563eb;
    color: #fff;
    font-weight: bold;
    position: relative;
  }

  select[multiple] option:checked::before {
    content: "✔ ";
    margin-right: 4px;
  }

  select[multiple]::-webkit-scrollbar {
    width: 6px;
  }

  select[multiple]::-webkit-scrollbar-thumb {
    background-color: #cbd5e1;
    border-radius: 4px;
  }
</style>

<div class="max-w-md mx-auto mt-10">
  <label for="skills" class="block mb-2 text-sm font-medium text-gray-700">ُ<h1>Select Role</h1></label>
  <select name="roles[]" id="skills" multiple class="block w-full h-52 p-3 text-sm text-gray-800 bg-white border border-gray-300 rounded-xl shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
  @foreach($roles as $role) 
  <option value="{{$role->name}}">{{$role->name}}</option>
   @endforeach
  </select>

</div>

<script>
  const select = document.getElementById('skills');
  select.addEventListener('mousedown', function (e) {
    e.preventDefault();
    const option = e.target;
    if (option.tagName === 'OPTION') {
      option.selected = !option.selected;
    }
  });
</script>

  
 <br>
<Button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">submit</Button>

</form>
</div>

@endsection