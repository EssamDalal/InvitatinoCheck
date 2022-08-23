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
            <h2 class="text-2xl py-2 text-gray-200 capitalize">Registered</h2>

            <!-- <a
              class="btn btn-warning float-end"
              :href="route('admin.registered.export')"
              >Export Registered Data</a
            > -->
            <a
              :href="route('admin.registered.export')"
              class="
                group
                items-center
                space-x-2
                py-3
                px-4
                bg-gray-900
                rounded
                flex
                justify-center
                transition
                duration-300
                text-slate-300
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
                  d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"
                /></svg
              ><span class="text-white group-hover:text-slate-50"
                >Export Registered Data</span
              ></a
            >
          </div>
          <h1 class="text-2xl text-slate-50">
            Here you can manage all the info about registered !
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
            placeholder="Search for registered name"
          />
        </div>
      </div>
      <table
        style="width: 280%"
        id="myTable2"
        class="
          table-fixed
          overflow-x-scroll
          text-sm text-left text-gray-500
          dark:text-gray-400
        "
      >
        <thead
          class="
            text-xs text-gray-700
            uppercase
            bg-gray-50
            dark:bg-gray-700 dark:text-gray-400
          "
        >
          <tr>
            <th
              v-on:click="sortTable('id')"
              scope="col"
              class="w-20 px-4 py-3 text-left"
            >
              Id
              <div
                class="arrow"
                v-if="'id' == sortColumn"
                v-bind:class="ascending ? 'arrow_up' : 'arrow_down'"
              ></div>
            </th>
            <th v-on:click="sortTable('name')" scope="col" class="px-6 py-3">
              Name
              <div
                class="arrow"
                v-if="'name' == sortColumn"
                v-bind:class="ascending ? 'arrow_up' : 'arrow_down'"
              ></div>
            </th>
            <th v-on:click="sortTable('email')" scope="col" class="px-6 py-3">
              Email
              <div
                class="arrow"
                v-if="'email' == sortColumn"
                v-bind:class="ascending ? 'arrow_up' : 'arrow_down'"
              ></div>
            </th>
            <th
              v-on:click="sortTable('position')"
              scope="col"
              class="px-4 py-3"
            >
              position
              <div
                class="arrow"
                v-if="'position' == sortColumn"
                v-bind:class="ascending ? 'arrow_up' : 'arrow_down'"
              ></div>
            </th>
            <th v-on:click="sortTable('jeha')" scope="col" class="px-4 py-3">
              jeha
              <div
                class="arrow"
                v-if="'jeha' == sortColumn"
                v-bind:class="ascending ? 'arrow_up' : 'arrow_down'"
              ></div>
            </th>
            <th
              v-on:click="sortTable('phone')"
              scope="col"
              class="px-6 py-3 text-left"
            >
              phone
              <div
                class="arrow"
                v-if="'phone' == sortColumn"
                v-bind:class="ascending ? 'arrow_up' : 'arrow_down'"
              ></div>
            </th>
            <th scope="col" class="px-4 py-3">questions</th>
            <th scope="col" class="px-4 py-3">come</th>
            <th
              v-on:click="sortTable('site_number')"
              scope="col"
              class="px-6 py-3 text-left"
            >
              site_number
              <div
                class="arrow"
                v-if="'site_number' == sortColumn"
                v-bind:class="ascending ? 'arrow_up' : 'arrow_down'"
              ></div>
            </th>
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
            v-for="(registered, i) in filteredItems"
            :key="i"
          >
            <td
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
              {{ registered.id }}
            </td>
            <td class="px-6 py-4">
              {{ registered.name }}
            </td>
            <td class="px-6 py-4">
              {{ registered.email }}
            </td>
            <td class="px-6 py-4">
              {{ registered.position }}
            </td>
            <td class="px-6 py-4">
              {{ registered.jeha }}
            </td>
            <td class="px-6 py-4">
              {{ registered.phone }}
            </td>
            <td class="px-6 py-4">
              <p v-if="registered.questions">
                {{ registered.questions }}
              </p>
              <p v-else>No Questions</p>
            </td>
            <td class="px-6 py-4">
              <p v-if="registered.come == '1'">Yes</p>
              <p v-else>No</p>
            </td>
            <td class="px-6 py-4">
              <p v-if="registered.site_number">
                {{ registered.site_number }}
              </p>
              <p v-else>X</p>
            </td>

            <td class="px-6 py-4 inline-flex">
              <form @submit.prevent="edit(registered)">
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
              <form @submit.prevent="destoy(registered.id)">
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

    <!-- <div class="container mx-auto px-4 sm:px-8">
      <div class="py-8">
        <div>
          <h2 class="text-2xl font-semibold leading-tight">Invoices</h2>
        </div>
        <div class="-mx-4 w-full sm:-mx-8 px-4 sm:px-8 py-4">
          <div
            class="
              inline-block
              overflow-x-scroll
              shadow-md
              rounded-lg
              overflow-hidden
            "
          >
            <table
              class="
                leading-normal
                table-fixed
                overflow-x-scroll
                text-sm text-left text-gray-500
                dark:text-gray-400
              "
              style="width: 280%"
            >
              <thead
                class="
                  text-xs text-gray-700
                  uppercase
                  bg-gray-50
                  dark:bg-gray-700 dark:text-gray-400
                "
              >
                <tr>
                  <th
                    class="
                      px-5
                      py-3
                      border-b-2 border-gray-200
                      bg-gray-100
                      text-left text-xs
                      font-semibold
                      text-gray-700
                      uppercase
                      tracking-wider
                    "
                  >
                    Client / Invoice
                  </th>
                  <th
                    class="
                      px-5
                      py-3
                      border-b-2 border-gray-200
                      bg-gray-100
                      text-left text-xs
                      font-semibold
                      text-gray-700
                      uppercase
                      tracking-wider
                    "
                  >
                    Amount
                  </th>
                  <th
                    class="
                      px-5
                      py-3
                      border-b-2 border-gray-200
                      bg-gray-100
                      text-left text-xs
                      font-semibold
                      text-gray-700
                      uppercase
                      tracking-wider
                    "
                  >
                    Amount
                  </th>
                  <th
                    class="
                      px-5
                      py-3
                      border-b-2 border-gray-200
                      bg-gray-100
                      text-left text-xs
                      font-semibold
                      text-gray-700
                      uppercase
                      tracking-wider
                    "
                  >
                    Amount
                  </th>
                  <th
                    class="
                      px-5
                      py-3
                      border-b-2 border-gray-200
                      bg-gray-100
                      text-left text-xs
                      font-semibold
                      text-gray-700
                      uppercase
                      tracking-wider
                    "
                  >
                    Amount
                  </th>
                  <th
                    class="
                      px-5
                      py-3
                      border-b-2 border-gray-200
                      bg-gray-100
                      text-left text-xs
                      font-semibold
                      text-gray-700
                      uppercase
                      tracking-wider
                    "
                  >
                    Amount
                  </th>
                  <th
                    class="
                      px-5
                      py-3
                      border-b-2 border-gray-200
                      bg-gray-100
                      text-left text-xs
                      font-semibold
                      text-gray-700
                      uppercase
                      tracking-wider
                    "
                  >
                    Issued / Due
                  </th>
                  <th
                    class="
                      px-5
                      py-3
                      border-b-2 border-gray-200
                      bg-gray-100
                      text-left text-xs
                      font-semibold
                      text-gray-700
                      uppercase
                      tracking-wider
                    "
                  >
                    Status
                  </th>
                  <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"
                  ></th>
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
                >
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <div class="flex">
                      <div class="flex-shrink-0 w-10 h-10">
                        <img
                          class="w-full h-full rounded-full"
                          src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                          alt=""
                        />
                      </div>
                      <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                          Molly Sanders
                        </p>
                        <p class="text-gray-600 whitespace-no-wrap">000004</p>
                      </div>
                    </div>
                  </td>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <p class="text-gray-900 whitespace-no-wrap">$20,000</p>
                    <p class="text-gray-600 whitespace-no-wrap">USD</p>
                  </td>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <p class="text-gray-900 whitespace-no-wrap">
                      Sept 28, 2019
                    </p>
                    <p class="text-gray-600 whitespace-no-wrap">
                      Due in 3 days
                    </p>
                  </td>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <span
                      class="
                        relative
                        inline-block
                        px-3
                        py-1
                        font-semibold
                        text-green-900
                        leading-tight
                      "
                    >
                      <span
                        aria-hidden
                        class="
                          absolute
                          inset-0
                          bg-green-200
                          opacity-50
                          rounded-full
                        "
                      ></span>
                      <span class="relative">Paid</span>
                    </span>
                  </td>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <p class="text-gray-900 whitespace-no-wrap">
                      Sept 28, 2019
                    </p>
                    <p class="text-gray-600 whitespace-no-wrap">
                      Due in 3 days
                    </p>
                  </td>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <p class="text-gray-900 whitespace-no-wrap">
                      Sept 28, 2019
                    </p>
                    <p class="text-gray-600 whitespace-no-wrap">
                      Due in 3 days
                    </p>
                  </td>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <p class="text-gray-900 whitespace-no-wrap">
                      Sept 28, 2019
                    </p>
                    <p class="text-gray-600 whitespace-no-wrap">
                      Due in 3 days
                    </p>
                  </td>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <p class="text-gray-900 whitespace-no-wrap">
                      Sept 28, 2019
                    </p>
                    <p class="text-gray-600 whitespace-no-wrap">
                      Due in 3 days
                    </p>
                  </td>
                  <td
                    class="
                      px-5
                      py-5
                      border-b border-gray-200
                      bg-white
                      text-sm text-right
                    "
                  >
                    <button
                      type="button"
                      class="inline-block text-gray-500 hover:text-gray-700"
                    >
                      <svg
                        class="inline-block h-6 w-6 fill-current"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M12 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm-2 6a2 2 0 104 0 2 2 0 00-4 0z"
                        />
                      </svg>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <div class="flex">
                      <div class="flex-shrink-0 w-10 h-10">
                        <img
                          class="w-full h-full rounded-full"
                          src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                          alt=""
                        />
                      </div>
                      <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                          Michael Roberts
                        </p>
                        <p class="text-gray-600 whitespace-no-wrap">000003</p>
                      </div>
                    </div>
                  </td>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <p class="text-gray-900 whitespace-no-wrap">$214,000</p>
                    <p class="text-gray-600 whitespace-no-wrap">USD</p>
                  </td>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <p class="text-gray-900 whitespace-no-wrap">
                      Sept 25, 2019
                    </p>
                    <p class="text-gray-600 whitespace-no-wrap">
                      Due in 6 days
                    </p>
                  </td>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <span
                      class="
                        relative
                        inline-block
                        px-3
                        py-1
                        font-semibold
                        text-green-900
                        leading-tight
                      "
                    >
                      <span
                        aria-hidden
                        class="
                          absolute
                          inset-0
                          bg-green-200
                          opacity-50
                          rounded-full
                        "
                      ></span>
                      <span class="relative">Paid</span>
                    </span>
                  </td>
                  <td
                    class="
                      px-5
                      py-5
                      border-b border-gray-200
                      bg-white
                      text-sm text-right
                    "
                  >
                    <button
                      type="button"
                      class="inline-block text-gray-500 hover:text-gray-700"
                    >
                      <svg
                        class="inline-block h-6 w-6 fill-current"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M12 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm-2 6a2 2 0 104 0 2 2 0 00-4 0z"
                        />
                      </svg>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <div class="flex">
                      <div class="flex-shrink-0 w-10 h-10">
                        <img
                          class="w-full h-full rounded-full"
                          src="https://images.unsplash.com/photo-1540845511934-7721dd7adec3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                          alt=""
                        />
                      </div>
                      <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                          Devin Childs
                        </p>
                        <p class="text-gray-600 whitespace-no-wrap">000002</p>
                      </div>
                    </div>
                  </td>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <p class="text-gray-900 whitespace-no-wrap">$20,000</p>
                    <p class="text-gray-600 whitespace-no-wrap">USD</p>
                  </td>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <p class="text-gray-900 whitespace-no-wrap">
                      Sept 14, 2019
                    </p>
                    <p class="text-gray-600 whitespace-no-wrap">
                      Due in 2 weeks
                    </p>
                  </td>
                  <td
                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                  >
                    <span
                      class="
                        relative
                        inline-block
                        px-3
                        py-1
                        font-semibold
                        text-orange-900
                        leading-tight
                      "
                    >
                      <span
                        aria-hidden
                        class="
                          absolute
                          inset-0
                          bg-orange-200
                          opacity-50
                          rounded-full
                        "
                      ></span>
                      <span class="relative">Pending</span>
                    </span>
                  </td>
                  <td
                    class="
                      px-5
                      py-5
                      border-b border-gray-200
                      bg-white
                      text-sm text-right
                    "
                  >
                    <button
                      type="button"
                      class="inline-block text-gray-500 hover:text-gray-700"
                    >
                      <svg
                        class="inline-block h-6 w-6 fill-current"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M12 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm-2 6a2 2 0 104 0 2 2 0 00-4 0z"
                        />
                      </svg>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td class="px-5 py-5 bg-white text-sm">
                    <div class="flex">
                      <div class="flex-shrink-0 w-10 h-10">
                        <img
                          class="w-full h-full rounded-full"
                          src="https://images.unsplash.com/photo-1522609925277-66fea332c575?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&h=160&w=160&q=80"
                          alt=""
                        />
                      </div>
                      <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">
                          Frederick Nicholas
                        </p>
                        <p class="text-gray-600 whitespace-no-wrap">000001</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-5 py-5 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">$12,000</p>
                    <p class="text-gray-600 whitespace-no-wrap">USD</p>
                  </td>
                  <td class="px-5 py-5 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">Sept 6, 2019</p>
                    <p class="text-gray-600 whitespace-no-wrap">
                      Due 3 weeks ago
                    </p>
                  </td>
                  <td class="px-5 py-5 bg-white text-sm">
                    <span
                      class="
                        relative
                        inline-block
                        px-3
                        py-1
                        font-semibold
                        text-red-900
                        leading-tight
                      "
                    >
                      <span
                        aria-hidden
                        class="
                          absolute
                          inset-0
                          bg-red-200
                          opacity-50
                          rounded-full
                        "
                      ></span>
                      <span class="relative">Overdue</span>
                    </span>
                  </td>
                  <td class="px-5 py-5 bg-white text-sm text-right">
                    <button
                      type="button"
                      class="inline-block text-gray-500 hover:text-gray-700"
                    >
                      <svg
                        class="inline-block h-6 w-6 fill-current"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M12 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm-2 6a2 2 0 104 0 2 2 0 00-4 0z"
                        />
                      </svg>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div> -->
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
    registereds: {
      type: Object,
      default: () => ({}),
    },
  },
  computed: {
    filteredItems() {
      return this.registereds.filter((registered) => {
        return (
          registered.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1
        );
      });
    },
  },
  data() {
    return {
      name: "Registered",
      search: "",
      sortColumn: "",
    };
  },
  methods: {
    destoy(id) {
      this.$inertia.delete(route("admin.registered.destroy", id));
    },
    edit(registered) {
      this.$inertia.get(route("admin.registered.edit", registered));
    },
    sortTable: function sortTable(registered) {
      if (this.sortColumn === registered) {
        this.ascending = !this.ascending;
      } else {
        this.ascending = true;
        this.sortColumn = registered;
      }

      var ascending = this.ascending;

      this.registereds.sort(function (a, b) {
        if (a[registered] > b[registered]) {
          return ascending ? 1 : -1;
        } else if (a[registered] < b[registered]) {
          return ascending ? -1 : 1;
        }
        return 0;
      });
    },
  },
};
</script>


<style scoped>
table th {
  cursor: pointer;
}
.arrow {
  float: right;
  width: 12px;
  height: 15px;
  background-repeat: no-repeat;
  background-size: contain;
  background-position-y: bottom;
}
.arrow_up {
  background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAaCAYAAACgoey0AAAAAXNSR0IArs4c6QAAAwpJREFUSA21Vt1PUmEYP4dvkQ8JFMwtBRocWAkDbiqXrUWXzU1rrTt0bdVqXbb1tbW16C9IBUSmm27cODdneoXjputa6069qwuW6IIBIdLvdaF4OAcOiGeDc87zPs/vd57P96WpFq7p6enbGo1mjKZpeTabjU1MTCRagGnOZHFxcXxtbe1XKpUq7+zslJeXl//Mz8+Hy+Uy3RxSE9qTk5M3otFooVQqgef4Wl9f343FYoEmoISrxuNxFX5f9vb2jhn/PxUKhfLS0tIPfFifUESRUMV8Pv/M6XReRm5rTGQyGeXxeGxYe1ezeBpBOBx2rKysbO7v79d4Wy3Y2Nj4GQqFbgnhaugxwiuGJx99Pp9FLBbXxYTXvTqd7v3MzIy6riIWGxJnMpl7AwMD14xGYyMsSq1WUyQdUqn0eSPlusQIsbGrq+vl4OCgvhFQZd1utyv1en0gEolcqsi47nWJlUrlG5fLZVcoFFy2nDKSDpIWlUoVTCQSEk4lCHmJMZ2GTCbTiMVikfIZ88l7enoos9l8dXt7+z6fDicxSJUokqDX6xXcl2wCROoc0vQCWL3sNfLOSdzR0fHY4XC4tVotl40gmVwup9xuN4OQv+UyqCFGH9rg7SOGYVRcBs3IEG4J0nVnamrqOtvuBDGGgQg9+wHFcVEi4a0LNkbdd6TrPKo8ODc311mteIIYjT/a398/jK+s1jnVM0kXoufCFvq0GuiIGEVgQIhfoygM1QrteEa9dAL7ITiYCt4RMabOK5AyKKzKWtvupLcRciu8D5J0EuDDPyT/Snd39yh6VtY2NhYQSR9G79Ds7OxdskRjEyAufvb7/cPoO5Z6e1+xtVKrq6vfcFzyi/A3ZrPZ3GdNSlwgo5ekE4X2RIQGf2C1WlufFE0GBeGWYQ8YERWLxQtnUVB830MKLZfL9RHir8lkssCn2G751tZWEWe03zTKm15YWPiEiXXTYDB0Ig/t7yd8PRws4EicwWHxO4jHD8/C5HiTTqd1BwcHFozKU89origB+y/kmzgYpgOBQP4fGmUiZmJ+WNgAAAAASUVORK5CYII=");
}
.arrow_down {
  background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB8AAAAaCAYAAABPY4eKAAAAAXNSR0IArs4c6QAAAvlJREFUSA29Vk1PGlEUHQaiiewslpUJiyYs2yb9AyRuJGm7c0VJoFXSX9A0sSZN04ULF12YEBQDhMCuSZOm1FhTiLY2Rky0QPlQBLRUsICoIN/0PCsGyox26NC3eTNn3r3n3TvnvvsE1PkwGo3yUqkkEQqFgw2Mz7lWqwng7ztN06mxsTEv8U0Aam5u7r5EInkplUol/f391wAJCc7nEAgE9Uwmkzo4OPiJMa1Wq6cFs7Ozt0H6RqlUDmJXfPIx+qrX69Ti4mIyHA5r6Wq1egND+j+IyW6QAUoul18XiUTDNHaSyGazKcZtdgk8wqhUKh9o/OMvsVgsfHJy0iWqVrcQNRUMBnd6enqc9MjISAmRP3e73T9al3XnbWNjIw2+KY1Gc3imsNHR0YV4PP5+d3e32h3K316TySQFoX2WyWR2glzIO5fLTSD6IElLNwbqnFpbWyO/96lCoai0cZjN5kfYQAYi5H34fL6cxWIZbya9iJyAhULBHAqFVlMpfsV/fHxMeb3er+Vy+VUzeduzwWC45XA4dlD/vEXvdDrj8DvURsYEWK3WF4FA4JQP9mg0WrHZbEYmnpa0NxYgPVObm5teiLABdTQT8a6vrwdRWhOcHMzMzCiXlpb2/yV6qDttMpkeshEzRk4Wo/bfoe4X9vb2amzGl+HoXNT29vZqsVi0sK1jJScG+Xx+HGkL4Tew2TPi5zUdQQt9otPpuBk3e0TaHmMDh1zS7/f780S0zX6Yni+NnBj09fUZUfvudDrNZN+GkQbl8Xi8RLRtHzsB9Hr9nfn5+SjSeWUCXC7XPq5kw53wsNogjZNohYXL2EljstvtrAL70/mVaW8Y4OidRO1/gwgbUMvcqGmcDc9aPvD1gnTeQ+0nmaInokRj0nHh+uvIiVOtVvt2a2vLv7Ky0tL3cRTXIcpPAwMDpq6R4/JXE4vFQ5FI5CN+QTaRSFCYc8vLy1l0rge4ARe5kJ/d27kYkLXoy2Jo4C7K8CZOsEBvb+9rlUp1xNXPL7v3IDwxvPD6AAAAAElFTkSuQmCC");
}
</style>


