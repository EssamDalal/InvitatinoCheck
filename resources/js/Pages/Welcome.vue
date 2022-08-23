<template>
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
            {{ $t("welcome") }}
          </h2>
          <Link class="w-3/4 ml-3" :href="route('admin.dashboard')"
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
              {{ $t("buttom") }}
            </button></Link
          >
          <Menu as="div" class="ml-3 relative">
            <div>
              <MenuButton
                class="
                  bg-gray-800
                  flex
                  text-sm
                  rounded-full
                  focus:outline-none
                  focus:ring-2
                  focus:ring-offset-2
                  focus:ring-offset-gray-800
                  focus:ring-white
                "
              >
                <span class="sr-only">Open user menu</span>
                <img
                  class="h-8 w-8 rounded-full"
                  src="https://cdn.w600.comps.canstockphoto.com/global-languages-translate-concept-vector-clipart_csp14699407.jpg"
                  alt=""
                />
              </MenuButton>
            </div>
            <transition
              enter-active-class="transition ease-out duration-100"
              enter-from-class="transform opacity-0 scale-95"
              enter-to-class="transform opacity-100 scale-100"
              leave-active-class="transition ease-in duration-75"
              leave-from-class="transform opacity-100 scale-100"
              leave-to-class="transform opacity-0 scale-95"
            >
              <MenuItems
                class="
                  origin-top-right
                  absolute
                  mt-2
                  w-48
                  rounded-md
                  shadow-lg
                  py-1
                  bg-white
                  ring-1 ring-black ring-opacity-5
                  focus:outline-none
                "
              >
                <MenuItem v-slot="{ active }">
                  <a
                    href="locale/en"
                    :class="[
                      active ? 'bg-gray-100' : '',
                      'block px-4 py-2 text-sm text-gray-700 w-full',
                    ]"
                    >English</a
                  >
                </MenuItem>
                <MenuItem v-slot="{ active }">
                  <a
                    href="locale/ar"
                    :class="[
                      active ? 'bg-gray-100' : '',
                      'block px-4 py-2 text-sm text-gray-700 w-full',
                    ]"
                    >Arbic</a
                  >
                </MenuItem>
              </MenuItems>
            </transition>
          </Menu>
        </div>
      </div>

      <form class="w-2/3 m-auto py-3" @submit.prevent="submit">
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
          >
            {{ $t("name") }}
          </label>
          <input
            type="text"
            v-model="form.name"
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
            :placeholder="$t('f_name')"
            required
          />
        </div>

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
          >
            {{ $t("position") }}
          </label>
          <input
            type="text"
            v-model="form.position"
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
            :placeholder="$t('f_position')"
            required
          />
        </div>

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
          >
            {{ $t("jeha") }}
          </label>
          <input
            type="text"
            v-model="form.jeha"
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
            :placeholder="$t('f_jeha')"
            required
          />
        </div>

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
          >
            {{ $t("email") }}
          </label>
          <input
            type="email"
            v-model="form.email"
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
            :placeholder="$t('f_email')"
            required
          />
        </div>

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
          >
            {{ $t("phone") }}
          </label>
          <input
            type="number"
            v-model="form.phone"
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
            :placeholder="$t('f_phone')"
            required
          />
        </div>

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
          >
            {{ $t("will_come") }}
          </label>
          <div class="flex flex-wrap">
            <div class="flex items-center mr-4">
              <input
                id="1"
                type="radio"
                value="1"
                v-model="form.come"
                name="come"
                class="
                  w-4
                  h-4
                  text-green-600
                  bg-gray-100
                  border-gray-300
                  focus:ring-green-500
                  dark:focus:ring-green-600 dark:ring-offset-gray-800
                  focus:ring-2
                  dark:bg-gray-700 dark:border-gray-600
                "
              />
              <label
                for="green-radio"
                class="
                  ml-2
                  text-sm
                  font-medium
                  text-gray-900
                  dark:text-gray-300
                "
              >
                {{ $t("f_yes") }}
              </label>
            </div>
            <div class="flex items-center mr-4">
              <input
                id="0"
                v-model="form.come"
                type="radio"
                value="0"
                name="come"
                class="
                  w-4
                  h-4
                  text-red-600
                  bg-gray-100
                  border-gray-300
                  focus:ring-red-500
                  dark:focus:ring-red-600 dark:ring-offset-gray-800
                  focus:ring-2
                  dark:bg-gray-700 dark:border-gray-600
                "
              />
              <label
                for="red-radio"
                class="
                  ml-2
                  text-sm
                  font-medium
                  text-gray-900
                  dark:text-gray-300
                "
              >
                {{ $t("f_no") }}
              </label>
            </div>
          </div>
        </div>

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
          >
            {{ $t("questions") }}
          </label>
          <textarea
            class="
              bg-gray-50
              border border-gray-300
              text-gray-900
              sm:text-sm
              rounded-lg
              focus:ring-blue-500 focus:border-blue-500
              block
              w-full
              pl-10
              p-2.5
              dark:bg-gray-700
              dark:border-gray-600
              dark:placeholder-gray-400
              dark:text-white
              dark:focus:ring-blue-500
              dark:focus:border-blue-500
            "
            id="subtitle"
            rows="3"
            :placeholder="$t('f_questions')"
            v-model="form.question"
          ></textarea>
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
          {{ $t("confirm") }}
        </button>
      </form>
    </div>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
import {
  Disclosure,
  DisclosureButton,
  DisclosurePanel,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
} from "@headlessui/vue";
import { BellIcon, MenuIcon, XIcon } from "@heroicons/vue/outline";

export default {
  components: {
    Link,
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    BellIcon,
    MenuIcon,
    XIcon,
  },
  setup() {
    const form = useForm({
      name: null,
      email: null,
      position: null,
      question: null,
      phone: null,
      jeha: null,
      come: null,
    });

    function submit() {
      form.post(route("store"));
    }

    return { form, submit };
  },
};
</script>


<style >
/* body {
  direction: rtl;
} */
input[type="date"]::-webkit-calendar-picker-indicator {
  position: absolute;
  left: 5%;
  color: white;
}
</style>


