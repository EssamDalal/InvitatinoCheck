
<template>
  <SideBar :name="name">
    <div>
      <div
        class="
          bg-gradient-to-r
          flex-auto
          w-42
          h-auto
          from-gray-900
          to-gray-700
          shadow-lg
          rounded-lg
        "
      >
        <div class="md:p-7 px-3 ml-5 p-4">
          <div class="grid grid-cols-2 gap-10">
            <h2 class="text-2xl py-2 text-gray-200 capitalize">
              Edit Site Number of Registered
            </h2>
          </div>
        </div>

        <form class="w-2/3 m-auto py-3" @submit.prevent="submit(registered)">
          <div class="mb-6">
            <label
              class="
                block
                mb-2
                text-sm
                font-medium
                text-gray-900
                dark:text-gray-300
              "
              >Site Number : {{ registered.site_number }}</label
            >
            <input
              type="number"
              v-model="form.site_number"
              class="
                bg-gray-50
                border border-gray-300
                text-gray-900 text-sm
                rounded-lg
                focus:ring-gray-500 focus:border-gray-500
                block
                w-full
                p-2.5
                dark:bg-gray-700
                dark:border-gray-600
                dark:placeholder-gray-400
                dark:text-white
                dark:focus:ring-gray-500
                dark:focus:border-gray-500
              "
              placeholder="Please add the site number !"
              required
            />
          </div>

          <button
            type="submit"
            class="
              bg-slate-900
              hover:bg-slate-800
              text-white
              font-bold
              py-2
              px-4
              m-4
              ml-0
              border-b-4 border-gray-700
              hover:border-gray-600
              rounded
            "
          >
            Edit Registered
          </button>
        </form>
      </div>
    </div>
  </SideBar>
</template>



<script>
import SideBar from "../../jetstream/SideBar.vue";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
  components: {
    SideBar,
  },
  props: {
    registered: {
      type: Object,
      default: () => ({}),
    },
  },
  setup() {
    const form = useForm({
      site_number: null,
    });

    function submit(registered) {
      form.put(route("admin.registered.update", registered));
    }

    return { form, submit };
  },
  data() {
    return {
      name: "Registered",
    };
  },
};
</script>

<style >
input[type="date"]::-webkit-calendar-picker-indicator {
  position: absolute;
  left: 5%;
  color: white;
}
</style>
