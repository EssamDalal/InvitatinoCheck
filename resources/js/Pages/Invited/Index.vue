<template>
  <SideBar :name="name">
    <div>
      <div
        v-if="$page.props.flash.success"
        id="alert-border-3"
        class="
          flex
          p-4
          mb-4
          bg-green-100
          border-t-4 border-green-500
          dark:bg-green-200
        "
        role="alert"
      >
        <svg
          class="flex-shrink-0 w-5 h-5 text-green-700"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
            clip-rule="evenodd"
          ></path>
        </svg>
        <div class="ml-3 text-lg font-medium text-green-700">
          {{ $page.props.flash.success }}
        </div>
      </div>
      <div
        v-if="$page.props.flash.delete"
        id="alert-border-3"
        class="
          flex
          p-4
          mb-4
          bg-red-100
          border-t-4 border-red-500
          dark:bg-red-200
        "
        role="alert"
      >
        <svg
          class="flex-shrink-0 w-5 h-5 text-red-700"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
            clip-rule="evenodd"
          ></path>
        </svg>
        <div class="ml-3 text-lg font-medium text-red-700">
          {{ $page.props.flash.delete }}
        </div>
      </div>
      <div
        class="
          bg-gradient-to-r
          flex-auto
          w-42
          h-56
          from-gray-900
          to-gray-700
          shadow-lg
          rounded-lg
        "
      >
        <div class="md:p-7 p-4">
          <div class="grid grid-cols-2 gap-10">
            <h2 class="text-2xl py-2 text-gray-200 capitalize">Invited</h2>
            <Link class="w-3/4 ml-3" :href="route('admin.invited.create')"
              ><button
                class="
                  bg-slate-900
                  hover:bg-slate-800
                  text-white
                  w-full
                  font-bold
                  py-2
                  px-4
                  border-b-4 border-gray-700
                  hover:border-gray-600
                  rounded
                "
              >
                Create New Invited
              </button></Link
            >
          </div>
          <h1 class="text-2xl text-slate-50">
            Here you can manage all the info about invited !
          </h1>
        </div>
      </div>
    </div>

    <div class="relative -mt-20 overflow-x-auto shadow-md sm:rounded-lg">
      <div class="p-4">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1">
          <div
            class="
              absolute
              inset-y-0
              left-0
              flex
              items-center
              pl-3
              pointer-events-none
            "
          >
            <svg
              class="w-5 h-5 text-gray-500 dark:text-gray-400"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </div>
          <input
            type="text"
            id="table-search"
            v-model="search"
            class="
              bg-gray-50
              border border-gray-300
              text-gray-900 text-sm
              rounded-lg
              focus:ring-blue-500 focus:border-blue-500
              block
              w-80
              pl-10
              p-2.5
              dark:bg-gray-700
              dark:border-gray-600
              dark:placeholder-gray-400
              dark:text-white
              dark:focus:ring-blue-500
              dark:focus:border-blue-500
            "
            placeholder="Search for invited email"
          />
        </div>
      </div>
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead
          class="
            text-xs text-gray-700
            uppercase
            bg-gray-50
            dark:bg-gray-700 dark:text-gray-400
          "
        >
          <tr>
            <th scope="col" class="px-6 py-3">Id</th>
            <th scope="col" class="px-6 py-3">Email</th>
            <th scope="col" class="px-6 py-3">Date Create</th>
            <th scope="col" class="px-6 py-3">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr
            class="
              bg-white
              border-b
              dark:bg-gray-800 dark:border-gray-700
              hover:bg-gray-50
              dark:hover:bg-gray-600
            "
            v-for="(invited, i) in filteredEmail"
            :key="i"
          >
            <th
              scope="row"
              class="
                px-7
                py-4
                font-medium
                text-gray-900
                dark:text-white
                whitespace-nowrap
              "
            >
              {{ i + 1 }}
            </th>
            <td class="px-6 py-4">
              {{ invited.email }}
            </td>
            <td class="px-6 py-4">
              {{ dateTime(invited.created_at) }}
            </td>

            <td class="px-6 py-4 inline-flex">
              <form @submit.prevent="edit(invited)">
                <button
                  class="
                    bg-blue-600
                    hover:bg-blue-700
                    text-white
                    font-bold
                    py-2
                    px-4
                    m-4
                    ml-1
                    rounded-full
                    inline-flex
                    items-center
                  "
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                    />
                  </svg>
                  <span class="ml-1">Edit</span>
                </button>
              </form>
              <form @submit.prevent="destoy(invited.id)">
                <button
                  class="
                    bg-red-600
                    hover:bg-red-700
                    text-white
                    font-bold
                    py-2
                    px-4
                    rounded-full
                    m-4
                    mr-1
                    inline-flex
                    items-center
                  "
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                    />
                  </svg>
                  <span class="ml-1">Delete</span>
                </button>
              </form>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </SideBar>
</template>

<script>
import SideBar from "../../jetstream/SideBar.vue";
import { Link } from "@inertiajs/inertia-vue3";
import moment from "moment";

export default {
  components: {
    SideBar,
    Link,
  },

  props: {
    inviteds: {
      type: Object,
      default: () => ({}),
    },
  },
  computed: {
    filteredEmail() {
      return this.inviteds.filter((invited) => {
        return (
          invited.email.toLowerCase().indexOf(this.search.toLowerCase()) > -1
        );
      });
    },
  },
  methods: {
    dateTime(value) {
      return moment(value).format("LLLL");
    },
    edit(invited) {
      this.$inertia.get(route("admin.invited.edit", invited));
    },
    destoy(id) {
      this.$inertia.delete(route("admin.invited.destroy", id));
    },
  },
  data() {
    return {
      name: "Invited",
      search: "",
    };
  },
};
</script>


