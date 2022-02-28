<template>
    <!-- component -->
    <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
        <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
        <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
            <div class=" pb-6">
                <p class="text-sm leading-none text-gray-600 dark:text-gray-300 ">{{ props.job.company.name }}</p>
                <h1 class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 text-gray-800 dark:text-white mt-2">
                    {{ props.job.title }}</h1>
            </div>


            <div class="border-t border-b py-4 mt-7 border-gray-200">
                <div data-menu class="flex justify-between items-center cursor-pointer">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Job Details</p>

                </div>
            </div>
            <div>
                <p class="xl:pr-48 text-base lg:leading-tight leading-normal text-gray-600 dark:text-gray-300 mt-7">{{ job.description }}</p>
            </div>
            <div>
                <p class="xl:pr-48 text-base lg:leading-tight leading-normal text-gray-600 dark:text-gray-300 mt-7">{{ job.content }}</p>
            </div>
            <div>
                <div class="border-t border-b py-4 mt-7 border-gray-200">
                    <div data-menu class="flex justify-between items-center cursor-pointer">
                        <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Company Details</p>

                    </div>
                </div>
                <div class="border-b py-4 mt-7 border-gray-200">
                    <div data-menu class="justify-between items-center cursor-pointer">
                        <p class="text-base leading-4 text-gray-800 dark:text-gray-300">name: {{ job.company.name}}</p>
                        <br>
                        <p class="text-base leading-4 text-gray-800 dark:text-gray-300">address: {{ JSON.parse(job.company.data).street + ' ' + JSON.parse(job.company.data).number}}</p>
                        <br>
                        <p class="text-base leading-4 text-gray-800 dark:text-gray-300"> {{ job.company.city?.name + job.company.city?.zip}}</p>
                        <br>
                        <p class="text-base leading-4 text-gray-800 dark:text-gray-300">VAT: {{ job.company.VAT}}</p>
                        <br>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Detail"
}
</script>

<script setup>


const props = defineProps({
    job: Object
})


let elements = document.querySelectorAll("[data-menu]");
for (let i = 0; i < elements.length; i++) {
    let main = elements[i];
    main.addEventListener("click", function () {
        let element = main.parentElement.parentElement;
        let andicators = main.querySelectorAll("svg");
        let child = element.querySelector("#sect");
        child.classList.toggle("hidden");
        andicators[0].classList.toggle("rotate-180");
    });
}
</script>

<style scoped>

</style>
