<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Animal') }}
        </h2>
    </x-slot>

    <form action="{{ route('manager.animal.save')}}" method="post">
        @csrf

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container py-12">
                        <p>Please fill in this form to add animal.</p>
                        <hr>
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label for="tagNumber"><b>Tag Number: </b></label>

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <!-- <input type="text" placeholder="Enter tag number" name="tagNumber" id="tagNumber"> -->
                                            <select name="breedLetter" id="breedLetter" required>
                                                <option value=""></option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                                <option value="F">F</option>
                                                <option value="G">G</option>
                                                <option value="H">H</option>
                                                <option value="I">I</option>
                                                <option value="J">J</option>
                                                <option value="K">K</option>
                                                <option value="L">L</option>
                                                <option value="M">M</option>
                                                <option value="N">N</option>
                                            </select>
                                            <input type="text" placeholder="Enter integer only" name="breedNumber" id="breedNumber" required>
                                            @if (Session::has('message'))
                                            <div class="alert alert-danger alert-dismissable fade show mb-3" style="margin-bottom: 0;" role="alert">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong style="color:red;"> {!! nl2br(Session::get('message')) !!} </strong>
                                            </div>
                                            @endif
                                        </td>
                                        <td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label for="breed"><b>Breed: </b></label>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <select name="breed" id="breed" required>
                                                <option value=""> --Select breed--</option>
                                                <option value="Kedah Kelantan">Kedah Kelantan</option>
                                                <option value="Kacukan Komersial Australia">Kacukan Komersial Australia</option>
                                                <option value="Kacukan Friesian-Sahiwal">Kacukan Friesian-Sahiwal</option>
                                                <option value="Local Indian Dairy">Local Indian Dairy</option>
                                                <option value="Droughtmaster">Droughtmaster</option>
                                                <option value="Hereford">Hereford</option>
                                                <option value="Angus">Angus</option>
                                                <option value="Charolais">Charolais</option>
                                                <option value="Shorthorn">Shorthorn</option>
                                                <option value="Simmental">Simmental</option>
                                                <option value="Brahman">Brahman</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label for="bornYear"><b>Born: </b></label>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <input type="date" placeholder="Enter Password" name="bornYear" id="bornYear" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label for="weight"><b>Weight: </b></label>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <input type="double" placeholder="Enter weight" name="weight" id="weight" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label for="health"><b>Health: </b></label>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <select name="health" id="health">
                                                <option value="Adequate">Adequate</option>
                                                <option value="Sub-Optimal">Sub-Optimal</option>
                                                <option value="Poor">Poor</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label for="comment"><b>Comment: </b></label>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <input type="text" placeholder="Enter comment" name="comment" id="comment">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label for="checkBy"><b>Registered By: </b></label>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label id="{{auth()->user()->id}}">{{auth()->user()->name}}</label><br>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button class="px-6 py-4 whitespace-nowrap" type="submit" class="registerbtn">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>