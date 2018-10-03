<h2 class="mb-4">Krok 1</h2>
<div class="grid grid-columns-1 grid-gap-8">
    <label class="font-bold" for="name">Imię*
        <input v-validate="'required'" class="mt-2 w-full" v-model="form.name" type="text"
               name="name"
               id="name">
        <p v-show="errors.has('name')" class="text-green text-xs mt-2 md:absolute">@{{ errors.first('name') }}</p>
    </label>
    <label class="font-bold" for="second_name">Nazwisko*
        <input v-validate="'required'" class="mt-2 w-full" v-model="form.secondName" type="text"
               name="second_name"
               id="second_name">
        <p v-show="errors.has('second_name')"
           class="text-green text-xs mt-2 md:absolute">@{{ errors.first('second_name') }}</p>
    </label>
</div>