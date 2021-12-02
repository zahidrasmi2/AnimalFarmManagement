<x-app-layout>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <style>
        .right {
            float: right;
        }

        .center {
            text-align: center;
        }

        .left {
            text-align: left;
        }

        .greeny {
            background-color: green;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .blue {
            background-color: rgb(17, 175, 248);
            color: rgb(0, 0, 0);
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .redy {
            background-color: rgb(248, 17, 17);
            color: rgb(255, 255, 255);
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .yelow {
            background-color: rgb(239, 255, 21);
            color: rgb(0, 0, 0);
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .clearfix {
            overflow: auto;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto auto auto;
            padding: 10px;
        }

        .grid-item {
            padding: 5px;
            text-align: left;
        }

        @media screen and (max-width: 800px) {
            .md-hidden {
                display: none;
            }
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Animal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-3">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <div class="table-responsive">
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="float:right;">
                                                        Search / Download
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    @csrf
                                                    <div class="grid-container">

                                                        <div class="grid-item">
                                                            {!! Form::open(['route' => 'manager.animal.searchAnimal', 'method' => 'get'])!!}

                                                            Tag Number:<br>
                                                            <select name="breedLetter" id="breedLetter">
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
                                                            <input type="text" placeholder="Enter integer only" name="breedNumber" id="breedNumber"> <br><br>

                                                            Breed: <br>
                                                            <select name="breed" id="breed">
                                                                <option value="">--Select Breed--</option>
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
                                                            </select><br><br>

                                                            Health: <br>
                                                            <select name="health" id="health">
                                                                <option value="">--Select Health--</option>
                                                                <option value="Adequate">Adequate</option>
                                                                <option value="Sub-Optimal">Sub-Optimal</option>
                                                                <option value="Poor">Poor</option>
                                                            </select><br><br>

                                                            Status: <br>
                                                            <select name="status" id="status">
                                                                <option value="">--Select Status--</option>
                                                                <option value="Alive">Alive</option>
                                                                <option value="Death">Death</option>
                                                                <option value="Butchered">Butchered</option>
                                                                <option value="Sold">Sold</option>
                                                            </select>
                                                        </div>
                                                        <div class="grid-item">
                                                            Last Check After: <br>
                                                            <input type="date" name="date_from" id="date_from"><br><br>

                                                            Last Check Before: <br>
                                                            <input type="date" name="date_until" id="date_until"><br>
                                                        </div>
                                                        <div class="grid-item">
                                                            Staff:<br>
                                                            <select name="staff_id" id="staff_id" class="form control input -sm">
                                                                <option value="">--Select Staff--</option>
                                                                @foreach ($staffList as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="grid-item">
                                                            {{ Form::Submit('Search',['class' => 'btn btn-primary'])}}<br><br>
                                                            <a class="greeny" href="{{ route('manager.animal.downloadExcel') }}" class="btn btn-success" title="Download as excel">Export to Excel</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="editable" class="table table-bordered table-striped">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider md-hidden">
                                                    ID
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Tag Number
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider md-hidden">
                                                    Breed
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider md-hidden">
                                                    Born Year
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Weight (KG)
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Health
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Comment
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider md-hidden">
                                                    Check By
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider md-hidden">
                                                    Last Check
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if($animal)
                                            @foreach ($animal as $ani)
                                            <tr class="bg-white divide-y divide-gray-200">
                                                <td class="px-6 py-4 whitespace-nowrap md-hidden">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $ani->id }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div style="text-align: center;">
                                                        <a href="{{ route('manager.animal.historyAnimal', [$ani->id]) }}">
                                                            {{ $ani->tagNumber }}
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap md-hidden">
                                                    <div class="text-sm text-gray-900 ">{{ $ani->breed }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap md-hidden">
                                                    <div class="text-sm text-gray-900">{{ $ani->bornYear }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $ani->weight }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <!-- <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> -->
                                                    <div class="text-sm text-gray-900">{{ $ani->health }}</div>
                                                    <!-- </span> -->
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $ani->comment }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $ani->status }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 md-hidden">
                                                    {{ $ani->userCheckBy ? $ani->userCheckBy->name : 'we' }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 md-hidden">
                                                    {{ $ani->checkDate }}
                                                </td>
                                                <td>
                                                    <form id="form{{ $ani->id }}" action="{{ route('manager.animal.deleteAnimal', [$ani->id]) }}" method="POST">
                                                        <a href="{{ route('manager.animal.updateAnimal', [$ani->id]) }}" class="blue">Update</a>
                                                        @if((Auth::user()->team_user && Auth::user()->team_user->role == 'admin')||!Auth::user()->team_user)
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{ route('manager.animal.editAnimal', [$ani->id]) }}" class="yelow">Edit</a>
                                                        <button onclick="confirmation('{{$ani->id}}');" class="redy">Delete</button>
                                                        @endif
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function confirmation(animal_id) {
            event.preventDefault();
            var answer = confirm('Are you sure you want to delete?');
            if (answer) {
                document.getElementById('form' + animal_id).submit();
            } else {
                alert("Cancelled the delete!")
            }
        }
    </script>

</x-app-layout>