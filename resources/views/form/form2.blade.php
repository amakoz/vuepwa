<h2 class="mb-4">Krok 2</h2>
<div class="grid grid-columns-1 grid-gap-8">
    <label class="font-bold" for="phone">Numer telefonu*
        <input v-validate="{required: true, regex: /^(?:\(?\+?48)?(?:[-\.\(\)\s]*(\d)){9}\)?$/ }"
               class="mt-2 w-full" v-model="form.phone" type="text" name="phone"
               id="phone">
        <p v-show="errors.has('phone')" class="text-green text-xs mt-2 md:absolute">@{{ errors.first('phone') }}</p>
    </label>
    <label class="font-bold" for="age">Data urodzenia*
        <input v-validate="'required|date_format:DD-MM-YYYY'" class="mt-2 w-full" v-model="form.age"
               type="text" name="age"
               id="age">
        <p v-show="errors.has('age')" class="text-green text-xs mt-2 md:absolute">@{{ errors.first('age') }}</p>
    </label>
</div>