  <div x-data="{action:'none'}"
      x-on:notify.window="action=event.detail.nextAction"
      x-on:action.window="action=event.detail.nextAction"
      class="p-5">
      @if (auth()->user()->role_type != 'student')
          <div x-show="action=='none'"
              class="flex justify-start mb-2">
              <button x-on:click.prevent="action='create'"
                  type="button"
                  class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Create Event
              </button>
          </div>
      @endif
      <div x-show="action=='none'">
          <div class="grid grid-cols-1 gap-4 pt-2 border-t">
              @includeWhen(count($happeningNowEvents) > 0,'user-pages.components.events.happening-events')
              @includeWhen(count($upcomingEvents) > 0,'user-pages.components.events.upcoming-events')
          </div>
          {{-- if both happening and upcomoming is empty --}}
          @if (count($happeningNowEvents) == 0 && count($upcomingEvents) == 0)
              <div class="text-center">
                  <p class="text-gray-600 ">
                      There's nothing here yet.
                  </p>
              </div>
          @endif
      </div>
      @if (auth()->user()->role_type != 'student')
          <div>
              <div x-cloak
                  x-show="action=='create'">
                  @include('user-pages.components.events.create-event')
              </div>
              <div x-cloak
                  x-show="action=='edit-event'">
                  @include('user-pages.components.events.edit-event')
              </div>
              <div>
                  @include('user-pages.components.events.delete-modal')
              </div>
          </div>
      @endif
  </div>
