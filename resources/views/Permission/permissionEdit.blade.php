@extends('admin.index')

@section('content')


<form class="max-w-sm mx-auto" action="{{route('permissionUpdate',$Permission->id)}}" method="post">
  @csrf
  @method('PUT')
  <h1>Edite Permission</h1>
  <br>
  <div class="mb-5">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">name</label>
    <input type="text" value="{{$Permission->name}}" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
 <br>
<Button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">submit</Button>

</form>

@endsection