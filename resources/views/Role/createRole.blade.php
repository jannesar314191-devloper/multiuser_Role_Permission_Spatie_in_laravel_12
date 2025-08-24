@extends('admin.index')

@section('content')


<form class="max-w-sm mx-auto" action="{{route('storeRole')}}" method="post">
  @csrf
  <h1>create Role</h1>
  <br>
  <div class="mb-5">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">name</label>
    <input type="text"  name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <br>

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
  <label for="skills" class="block mb-2 text-sm font-medium text-gray-700">ُSelect Permissions</label>
  <select name="permissions[]" id="skills" multiple class="block w-full h-52 p-3 text-sm text-gray-800 bg-white border border-gray-300 rounded-xl shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
  @foreach($permissions as $permission) 
  <option value="{{$permission->name}}">{{$permission->name}}</option>
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



@endsection