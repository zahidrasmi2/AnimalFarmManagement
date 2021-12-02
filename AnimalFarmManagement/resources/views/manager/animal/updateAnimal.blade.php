<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Animal') }}
        </h2>
    </x-slot>

    <form action="{{ route('manager.animal.saveUpdateAnimal', [$id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container py-12">
                        <p>Please fill in this form to update animal.</p>
                        @if (Session::has('message'))
                        <div class="alert alert-danger alert-dismissable fade show mb-3" style="margin-bottom: 0;" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong style="color:red;"> {!! nl2br(Session::get('message')) !!} </strong>
                        </div>
                        @endif
                        <hr>

                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label for="tagNumber"><b>ID: </b></label>
                                        </td>
                                        <td> {{ $animal->id }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label for="tagNumber"><b>Tag Number: </b></label>
                                        </td>
                                        <td> {{ $animal->tagNumber }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label for="breed"><b>Breed: </b></label>
                                        </td>
                                        <td> {{ $animal->breed }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label for="bornYear"><b>Born: </b></label>
                                        </td>
                                        <td> {{ $animal->bornYear }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label for="weight"><b>Weight (KG): </b></label>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <input type="double" placeholder="Enter weight" value="{{ $animal->weight }}" name="weight" id="weight" required>KG
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label for="health"><b>Health: </b></label>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <select name="health" id="health">
                                                <option @if($animal->health=='Adequate') selected @endif value="Adequate">Adequate</option>
                                                <option @if($animal->health=='Sub-Optimal') selected @endif value="Sub-Optimal">Sub-Optimal</option>
                                                <option @if($animal->health=='Poor') selected @endif value="Poor">Poor</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label for="comment"><b>Comment: </b></label>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <input type="text" placeholder="Enter comment" name="comment" id="comment" value="{{ $animal->comment }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label for="status"><b>Status: </b></label>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <select name="status" id="status">
                                                <option @if($animal->status=='Alive') selected @endif value="Alive">Alive</option>
                                                <option @if($animal->status=='Death') selected @endif value="Death">Death</option>
                                                <option @if($animal->status=='Butchered') selected @endif value="Butchered">Butchered</option>
                                                <option @if($animal->status=='Sold') selected @endif value="Sold">Sold</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label for="checkBy"><b>Update By: </b></label>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label id="{{auth()->user()->id}}">{{auth()->user()->name}}</label><br>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button class="px-6 py-4 whitespace-nowrap" type="submit" class="registerbtn">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>