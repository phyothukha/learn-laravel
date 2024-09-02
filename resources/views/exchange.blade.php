 @extends('layouts.main')


 @section('content')
     <button type="button"
         class="hs-dark-mode-active:block hidden hs-dark-mode font-medium text-gray-800 rounded-full hover:bg-gray-200 focus:outline-none focus:bg-gray-200 dark:text-neutral-200 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
         data-hs-theme-click-value="light">
         <span class="group inline-flex shrink-0 justify-center items-center size-9">
             <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                 <circle cx="12" cy="12" r="4"></circle>
                 <path d="M12 2v2"></path>
                 <path d="M12 20v2"></path>
                 <path d="m4.93 4.93 1.41 1.41"></path>
                 <path d="m17.66 17.66 1.41 1.41"></path>
                 <path d="M2 12h2"></path>
                 <path d="M20 12h2"></path>
                 <path d="m6.34 17.66-1.41 1.41"></path>
                 <path d="m19.07 4.93-1.41 1.41"></path>
             </svg>
         </span>
     </button>
     <div class="mx-auto max-w-screen-md py-12 px-4 sm:px-6 md:max-w-screen-xl md:py-20 lg:py-32 md:px-8">
         <div class="md:pe-8 md:w-1/2 xl:pe-0 xl:w-5/12">
             <!-- Form -->
             <form action="{{ route('exchange') }}" method="POST">
                 @csrf
                 <div class="mb-4">
                     <label for="hs-hero-name-2" class="block text-sm font-medium dark:text-white"><span
                             class="sr-only">Amount</span></label>
                     <input type="text" name="amount"
                         class="py-3 px-4 block w-full border-gray-200 border  rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                         placeholder="Amount">
                 </div>
                 <div class="relative mb-4">
                     <select name="from"
                         data-hs-select='{
                           "placeholder": "Select option...",
                           "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                           "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                           "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-neutral-900 dark:border-neutral-700",
                           "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                           "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"
                         }'>

                         <option value="">Select</option>
                         <option value="USD">USD</option>
                         <option value="SGD">SGD</option>
                         {{-- <option value="MMK">MMK</option> --}}
                         <option value="EUR">EUR</option>

                     </select>

                     <div class="absolute top-1/2 end-2.5 -translate-y-1/2">
                         <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                             width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                             <path d="m7 15 5 5 5-5"></path>
                             <path d="m7 9 5-5 5 5"></path>
                         </svg>
                     </div>
                 </div>


                 <div class="relative mb-4">
                     <select name="to"
                         data-hs-select='{
                            "placeholder": "Select option...",
                            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                            "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-neutral-900 dark:border-neutral-700",
                            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                            "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"
                          }'>
                         <option value="">Select</option>
                         <option value="USD">USD</option>
                         <option value="SGD">SGD</option>
                         {{-- <option value="MMK">MMK</option> --}}
                         <option value="EUR">EUR</option>
                     </select>

                     <div class="absolute top-1/2 end-2.5 -translate-y-1/2">
                         <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                             width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                             <path d="m7 15 5 5 5-5"></path>
                             <path d="m7 9 5-5 5 5"></path>
                         </svg>
                     </div>
                 </div>

                 <div class="grid">
                     <button type="submit"
                         class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Submit</button>
                 </div>
             </form>
             <!-- End Form -->
         </div>
     </div>
 @endsection
