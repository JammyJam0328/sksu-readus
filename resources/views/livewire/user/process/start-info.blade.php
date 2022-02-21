 <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
     <div class="sm:mx-auto sm:w-full sm:max-w-md">

         <h2 class="mt-2 text-center text-3xl font-extrabold text-gray-700 font-serif">
             Welcome <br> to <br> <span class="text-green-600">SKSU</span> <br>Discussion Forum
         </h2>

     </div>
     <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-md px-2 md:px-0">

         <form class="space-y-8 divide-y divide-gray-200">
             @csrf
             <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">


                 <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                     <div>
                         <h3 class="text-lg leading-6 font-medium text-gray-900">
                             Personal Information
                         </h3>

                     </div>
                     <div class="space-y-6 sm:space-y-5">
                         <div
                             class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                             <label for="first-name"
                                 class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                 First name
                             </label>
                             <div class="mt-1 sm:mt-0 sm:col-span-2">
                                 <input wire:model.defer="first_name"
                                     type="text"
                                     name="first-name"
                                     id="first-name"
                                     autocomplete="first-name"
                                     class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                 @error('first_name')
                                     <span class="text-red-600 italic">{{ $message }}</span>
                                 @enderror
                             </div>
                         </div>
                         <div
                             class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                             <label for="middle-name"
                                 class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                 Middle name
                             </label>
                             <div class="mt-1 sm:mt-0 sm:col-span-2">
                                 <input wire:model.defer="middle_name"
                                     type="text"
                                     name="middle-name"
                                     id="middle-name"
                                     autocomplete="middle-name"
                                     class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                 @error('middlename')
                                     <span class="text-red-600 italic">{{ $message }}</span>
                                 @enderror
                             </div>
                         </div>


                         <div
                             class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                             <label for="last-name"
                                 class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                 Last name
                             </label>
                             <div class="mt-1 sm:mt-0 sm:col-span-2">
                                 <input wire:model.defer="last_name"
                                     type="text"
                                     name="last-name"
                                     id="last-name"
                                     autocomplete="family-name"
                                     class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                 @error('last_name')
                                     <span class="text-red-600 italic">{{ $message }}</span>
                                 @enderror
                             </div>
                         </div>
                         <div
                             class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                             <label for="type"
                                 class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                 I am a :
                             </label>

                             <div class="mt-1 sm:mt-0 sm:col-span-2">
                                 <select wire:model="user_type"
                                     name="iam"
                                     id="iam"
                                     class="max-w-lg block w-full uppercase shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                     <option value=""></option>
                                     @foreach ($roles as $key => $type)
                                         <option value="{{ $key }}">{{ $type }}</option>
                                     @endforeach
                                 </select>
                                 @error('user_type')
                                     <span class="text-red-600 italic">{{ $message }}</span>
                                 @enderror
                             </div>
                         </div>
                         <div
                             class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                             <label for="campus"
                                 class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                 Campus
                             </label>
                             <div class="mt-1 sm:mt-0 sm:col-span-2">
                                 <select wire:model="campus"
                                     name="campus"
                                     id="campus"
                                     class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                     <option value=""></option>
                                     @foreach ($_campuses as $key => $campus)
                                         <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                                     @endforeach
                                 </select>
                                 @error('campus')
                                     <span class="text-red-600 italic">{{ $message }}</span>
                                 @enderror
                             </div>
                         </div>
                         <div
                             class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                             <label for="department"
                                 class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                 Deparmtent
                             </label>
                             <div class="mt-1 sm:mt-0 sm:col-span-2">
                                 <select wire:model="department"
                                     name="department"
                                     id="department"
                                     class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                     <option value=""></option>
                                     @foreach ($_departments as $key => $department)
                                         <option value="{{ $department->id }}">{{ $department->name }}</option>
                                     @endforeach
                                 </select>
                                 @error('department')
                                     <span class="text-red-600 italic">{{ $message }}</span>
                                 @enderror
                                 @if ($user_type != 'student' && $user_type != '')
                                     <span class="text-gray-400 text-xs">Optional for {{ $user_type }}</span>
                                 @endif
                             </div>
                         </div>
                         <div
                             class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                             <label for="course"
                                 class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                 Course
                             </label>
                             <div class="mt-1 sm:mt-0 sm:col-span-2">
                                 <select wire:model.defer="course"
                                     name="course"
                                     id="course"
                                     class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                     <option value=""></option>
                                     @foreach ($_courses as $key => $course)
                                         <option value="{{ $course->id }}">{{ $course->name }}</option>
                                     @endforeach
                                 </select>
                                 @error('course')
                                     <span class="text-red-600 italic">{{ $message }}</span>
                                 @enderror
                                 @if ($user_type != 'student' && $user_type != '')
                                     <span class="text-gray-400 text-xs">Optional for {{ $user_type }}</span>
                                 @endif
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="pt-5">
                 <div class="flex justify-end">
                     <button wire:click.prevent="create"
                         type="button"
                         class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                         Save
                     </button>
                 </div>
             </div>
         </form>

     </div>
 </div>
