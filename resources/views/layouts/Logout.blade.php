            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="mt-2 px-6 py-2 rounded-full bg-red-500 hover:bg-red-600 text-white text-sm font-semibold transition">
                    Logout
                </button>
            </form>
