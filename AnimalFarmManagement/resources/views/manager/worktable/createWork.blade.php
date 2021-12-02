    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Schedule') }}
            </h2>
        </x-slot>

        <style>
            .blue {
                background-color: rgb(17, 175, 248);
                color: rgb(0, 0, 0);
                padding: 5px 10px;
                text-align: center;
                text-decoration: none;
                display: inline-block;

            }
        </style>
        <form action="{{ route('manager.worktable.save')}}" method="post">
            @csrf

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="container py-12">
                            <p>Please fill in this form to add worktable.</p>
                            <hr>
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">


                                <table class="min-w-full divide-y divide-gray-200">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <label for="tagNumber"><b>Date: </b></label>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                From: <input type="date" placeholder="Enter Password" name="date_from" id="date_from">
                                                Until: <input type="date" placeholder="Enter Password" name="date_until" id="date_until">
                                                @error('date_from')
                                                <span class="pl-1 text-red-500">{{ $message }}</span>
                                                @enderror
                                                @error('date_until')
                                                <span class="pl-1 text-red-500">{{ $message }}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <label for="staff"><b>Staff(s): </b></label>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <select name="staff_id" id="staff_id" class="form control input -sm">
                                                    @foreach ($staffList as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <label for="aniID"><b>Animal(s): </b></label>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @error('animals')
                                                <div class="pl-1 text-red-500">{{ $message }}</div>
                                                @enderror
                                                <table id="editable" class="table table-bordered table-striped table-responsive">
                                                    <thead class="bg-gray-50">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Checklist
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Tag Number
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Health
                                                            </th>
                                                            <!-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Comment
                                                            </th> -->
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                Status
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider md-hidden">
                                                                Check By
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider md-hidden">
                                                                Last Check
                                                            </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @if($animal)
                                                        @foreach ($animal as $ani)
                                                        <tr class="bg-white divide-y divide-gray-200">
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div>
                                                                    <input type="checkbox" name="animals[]" value="{{$ani->id}}">
                                                                </div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div>
                                                                    <a href="{{ route('manager.animal.historyAnimal', [$ani->id]) }}">{{ $ani->tagNumber }}</a>
                                                                </div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="text-sm text-gray-900">{{ $ani->health }}</div>
                                                            </td>
                                                            <!-- <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="text-sm text-gray-900">{{ $ani->comment }}</div>
                                                            </td> -->
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
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <label for="detail"><b>Details: </b></label>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <textarea type="text" placeholder="Enter details" name="details" id="details"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <label for="checkBy"><b>Registered By: </b></label>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <label id="{{auth()->user()->id}}">{{auth()->user()->name}}</label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><br>
                            <div class="text-center">
                                <button class="blue" type="submit" class="addbtn">Create Schedule</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </x-app-layout>