@include('partials.header')
<h1 class="text-2xl font-medium flex justify-center pt-4">Please fill in the form to make a reservation:</h1> 
<div class="flex justify-center p-4 border-b-2"> 
    <form>
        <label class="font-medium">Check-in:</label><br>
        <input class="bg-gray-100 w-full border-2 rounded" type="date"><br>
        <label class="font-medium">Check-out:<label><br>
        <input class="bg-gray-100 w-full border-2 rounded" type="date"><br>
        <label class="font-medium">How many adults?</label><br>
        <input class="bg-gray-100 w-full border-2 rounded" type="field"><br>
        <label class="font-medium">How many children?</label><br>
        <input class="bg-gray-100 w-full border-2 rounded" type="field"><br>
        <label class="font-medium">How many rooms?</label><br>
        <input class="bg-gray-100 w-full border-2 rounded" type="field"><br>
        <input type="submit" value="Make reservation" class="inline-block text-sm px-8 py-3 bg-blue-500 leading-none border rounded-lg text-white border-blue hover:border-transparent hover:text-teal-500 hover:bg-gray-400 mt-4 w-full lg:mt-0"> 
    </form>
</div>
@include('partials.footer')