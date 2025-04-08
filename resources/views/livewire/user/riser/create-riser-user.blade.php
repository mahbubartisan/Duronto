<div>
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2>Add Customer</h2>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->
    <div class="card p-2">
        <div class="card-body">
            <div class="row">
                <!-- Image Upload Section -->
                <div class="col-md-4 text-center">
                    <div class="image-upload-container">
                        <p>Click to upload image</p>
                        <input type="file" id="media" wire:model="media">
                    </div>
                </div>

                <!-- Form Section -->
                <div class="col-md-8">
                    <form wire:submit.prevent='store'>
                        <div class="mb-3">
                            <label for="name" class="form-label text-black text-sm">Customer Name</label>
                            <input type="text" type="text" id="name" wire:model="name"
                                class="form-control text-sm" placeholder="Enter full name">
                            @error("name")
                                <span class="text-sm text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label text-black text-sm">Email</label>
                                <input type="email" id="email" wire:model="email" class="form-control text-sm"
                                    placeholder="Enter email address">
                                @error("email")
                                   <span class="text-sm text-danger mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label text-black text-sm">Phone</label>
                                <input type="text" id="phone" wire:model="phone" class="form-control text-sm"
                                    placeholder="Enter phone number">
                                @error("phone")
                                    <span class="text-sm text-danger mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label text-black text-sm">Address</label>
                            <textarea class="form-control text-sm" id="address" wire:model="address" rows="2" placeholder="Enter address"></textarea>
                            @error("address")
                                <span class="text-sm text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="dob" class="form-label text-black text-sm">Date of Birth</label>
                                <input type="date" id="dob" wire:model="dob" class="form-control text-sm">
                                @error("dob")
                                    <span class="text-sm text-danger mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="gender" class="form-label text-black text-sm">Gender</label>
                                <select id="gender" wire:model="gender" class="form-control text-sm">
                                    <option selected>-- Select Gender --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                @error("gender")
                                    <span class="text-sm text-danger mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="national_id" class="form-label text-black text-sm">National ID</label>
                                <input type="text" id="national_id" wire:model="national_id"
                                    class="form-control text-sm" placeholder="Enter national ID">
                                @error("national_id")
                                    <span class="text-sm text-danger mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="profession" class="form-label text-black text-sm">Profession</label>
                                <input type="text" id="profession" wire:model="profession"
                                    class="form-control text-sm" placeholder="Enter profession">
                                @error("profession")
                                    <span class="text-sm text-danger mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="company_name" class="form-label text-black text-sm">Company Name</label>
                                <input type="text" id="company_name" wire:model="company_name"
                                    class="form-control text-sm" placeholder="Enter company name">
                                @error("company_name")
                                    <span class="text-sm text-danger mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="monthly_income" class="form-label text-black text-sm">Monthly
                                    Income</label>
                                <input type="text" id="monthly_income" wire:model="monthly_income"
                                    class="form-control text-sm" placeholder="Enter monthly income">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="specialNotes" class="form-label text-black text-sm">Special Notes</label>
                            <textarea id="special_notes" wire:model="special_notes" class="form-control text-sm" rows="3"
                                placeholder="Enter any special notes"></textarea>
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
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
