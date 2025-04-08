<div>
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2>Duronto Subscriptions</h2>
                </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                    <button class="btn btn-primary text-sm py-2 px-4" data-bs-toggle="modal" data-bs-target="#ModalOne">
                        Create
                    </button>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <!-- ========== tables-wrapper start ========== -->
    <div class="custom-container">
        <!-- Table Wrapper with Rounded Corners and Shadow -->
        <div class="custom-table-wrapper p-4">
            <!-- Top Controls -->
            <div class="entries-dropdown">
                <div class="search-bar d-flex ms-auto">
                    <input type="search" wire:model.live='search' class="form-control text-sm"
                        placeholder="Search..." />
                </div>
            </div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Package Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subscriptions as $index => $subscription)
                        <tr>
                            <th scope="row">{{ $subscriptions->firstItem() + $index }}</th>
                            <td>
                                <p>{{ optional($subscription->customer)->name }}</p>
                            </td>
                            <td>
                                <p>{{ optional($subscription->package)->name }}</p>
                            </td>
                            <td>
                                <p>{{ $subscription->start_date }}</p>
                            </td>
                            <td>
                                <p>{{ $subscription->end_date }}</p>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a type="button" wire:click='edit({{ $subscription->id }})' class="me-3">
                                        <span>
                                            <i class="lni lni-pencil-alt" style="color:limegreen; font-size: 1rem;"></i>
                                        </span>
                                    </a>
                                    <a type="button" wire:click='delete({{ $subscription->id }})'
                                        onclick="return confirm('Are you sure you want to delete this package?')">
                                        <span>
                                            <i class="lni lni-trash-can" style="color:red; font-size: 1rem;"></i>
                                        </span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                <p class="text-danger">No records found.</p>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

            <!-- Footer Info with Top Border -->
            <div class="footer-info">
                <!-- Showing Entries -->
                <span>Showing {{ $subscriptions->firstItem() }} to {{ $subscriptions->lastItem() }} of
                    {{ $subscriptions->total() }} entries</span>

                <!-- Pagination -->
                <ul class="pagination">
                    <!-- Previous Page Link -->
                    @if ($subscriptions->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $subscriptions->previousPageUrl() }}">Previous</a>
                        </li>
                    @endif

                    <!-- Pagination Links -->
                    @foreach ($subscriptions->getUrlRange(1, $subscriptions->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $subscriptions->currentPage() ? "active" : "" }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($subscriptions->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $subscriptions->nextPageUrl() }}">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">Next</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <!-- ========== tables-wrapper end ========== -->


    <!-- ModalOne start -->
    <div class="follow-up-modal">
        <div wire:ignore.self class="modal fade" id="ModalOne" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 635px;">
                <div class="modal-content p-2">
                    <div class="modal-body">
                        <h4 class="text-center mb-4">
                            {{ $editingSubscription ? "Update Duronto POS Subscription" : "Create Duronto POS Subscription" }}
                        </h4>
                        <form wire:submit.prevent="{{ $editingSubscription ? "update" : "submit" }}">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="customer_id" class="form-label text-black text-sm">
                                        Customer Name <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group" wire:ignore>
                                        <span class="input-group-text"><i class="lni lni-user"></i></span>
                                        <select wire:model.defer="customer_id" id="customer_id" data-tom-select
                                            style="width: 238px;">
                                            <option value="" hidden>--- Select One ---</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}"
                                                    @if ($customer_id == $customer->id) selected @endif>
                                                    {{ $customer->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error("customer_id")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="package_id" class="form-label text-black text-sm">
                                        Package Name <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group" wire:ignore>
                                        <span class="input-group-text"><i class="lni lni-package"></i></span>
                                        <select wire:model.defer="package_id" id="package_id" data-tom-select
                                            style="width: 238px;">
                                            <option value="" hidden>--- Select One ---</option>
                                            @foreach ($packages as $package)
                                                <option value="{{ $package->id }}"
                                                    @if ($package_id == $package->id) selected @endif>
                                                    {{ $package->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error("package_id")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="start_date" class="form-label text-black text-sm">Start Date<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="lni lni-calendar"></i></span>
                                        <input type="date" wire:model="start_date" class="form-control text-sm"
                                            id="start_date">
                                        @error("start_date")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="end_date" class="form-label text-black text-sm">End Date<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="lni lni-calendar"></i></span>
                                        <input type="date" wire:model="end_date" class="form-control text-sm"
                                            id="end_date">
                                        @error("end_date")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label class="form-label text-black text-sm">Status<span
                                            class="text-danger">*</span></label>
                                    <div class="d-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="radio" wire:model="status"
                                                value="1" id="status-active">
                                            <label class="form-check-label text-sm" for="status-active">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" wire:model="status"
                                                value="0" id="status-inactive">
                                            <label class="form-check-label text-sm" for="status-inactive">
                                                Inactive
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="action d-flex flex-wrap justify-content-center">
                                <button type="button" data-bs-dismiss="modal" id="close-modal"
                                    class="main-btn btn-sm primary-btn-outline square-btn btn-hover m-1">
                                    Close
                                </button>
                                <button wire:click="{{ $editingSubscription ? "update" : "submit" }}" type="button"
                                    class="main-btn btn-sm primary-btn square-btn btn-hover m-1">
                                    {{ $editingSubscription ? "Update" : "Create" }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ModalOne End -->

    <script>
        window.addEventListener('open-modal', event => {
            var modal = new bootstrap.Modal(document.getElementById('ModalOne'));
            modal.show();
        });

        window.addEventListener('close-modal', event => {
            console.log('Close modal event triggered');
            var button = document.getElementById("close-modal");
            button.click();

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const customerSelect = new TomSelect('#customer_id', {
                maxItems: 1,
                // plugins: ['dropdown_input'],
            });

            const packageSelect = new TomSelect('#package_id', {
                maxItems: 1,
                // plugins: ['dropdown_input'],
            });

            customerSelect.on('change', (value) => {
                @this.set('customer_id', value);
            });

            packageSelect.on('change', (value) => {
                @this.set('package_id', value);
            });

            window.addEventListener('open-modal', () => {
                customerSelect.setValue(@this.customer_id || '');
                packageSelect.setValue(@this.package_id || '');
            });
        });
    </script>




</div>
