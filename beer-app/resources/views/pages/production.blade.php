<x-app>
    <x-navigation-bar/>
    
    <div class="flex justify-center items-center h-screen">
        <form class="space-y-20">

            <div class="flex space-x-10">
                <select class="border rounded-xl py-4 px-2">
                    <option disabled selected hidden>Select clothing item</option>

                    <option>Pilsner</option>
                    <option>IPA</option>
                    <option>Stout</option>
                    <option>Ale</option>
                    <option>Alcohol Free</option>
                </select>

                <div>
                    <label>Speed</label>
                    <input class="border border-black rounded-lg hover:bg-gray-100">
                </div>

                <div>
                    <label>Quantity</label>
                    <input class="border border-black rounded-lg hover:bg-gray-100">
                </div>
            </div>

            <div class="flex space-x-10 justify-center">
                <button class="px-4 py-2 cursor-pointer border bg-yellow-100 hover:bg-yellow-300 rounded-lg">Calibrate</button>
                <button class="px-4 py-2 cursor-pointer border bg-red-100 hover:bg-red-300 rounded-lg">Clear</button>
                <button class="px-4 py-2 cursor-pointer border bg-green-100 hover:bg-green-300 rounded-lg">Submit</button>
            </div>
        </form>
    </div>
</x-app>
