<!-- Add Staff Modal -->
<div id="addStaffModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; background-color: rgba(0, 0, 0, 0.5); align-items: center; justify-content: center;">
    <!-- Modal Content -->
    <div style="background: white; border-radius: 12px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); width: 90%; max-width: 1400px; margin: auto; position: relative;">
            
            <!-- Modal Header -->
            <div style="padding: 24px; border-bottom: 1px solid #e5e7eb;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0;">
                    <h3 style="font-size: 1.25rem; font-weight: 600; color: #111827; margin: 0;">Add New Staff Member</h3>
                    <button type="button" onclick="closeAddStaffModal()" style="background: none; border: none; color: #9ca3af; cursor: pointer; font-size: 24px; line-height: 1; padding: 0;">
                        ×
                    </button>
                </div>
                
                <!-- Step Progress Indicator -->
                <div style="margin-top: 24px;">
                    <div style="display: flex; align-items: center; justify-content: space-between; position: relative;">
                        <!-- Progress Line Background -->
                        <div style="position: absolute; top: 20px; left: 0; right: 0; height: 2px; background: #e5e7eb; z-index: 0;"></div>
                        <!-- Progress Line Active -->
                        <div id="progressLine" style="position: absolute; top: 20px; left: 0; height: 2px; background: var(--primary); z-index: 0; width: 0%; transition: width 0.3s ease;"></div>
                        
                        <!-- Step 1 -->
                        <div style="display: flex; flex-direction: column; align-items: center; position: relative; z-index: 1; flex: 1;">
                            <div id="step1Circle" style="width: 40px; height: 40px; border-radius: 50%; background: var(--primary); border: 3px solid white; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 14px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: all 0.3s ease;">1</div>
                            <span id="step1Text" style="margin-top: 8px; font-size: 0.75rem; font-weight: 600; color: var(--primary);">Staff Info</span>
                        </div>
                        
                        <!-- Step 2 -->
                        <div style="display: flex; flex-direction: column; align-items: center; position: relative; z-index: 1; flex: 1;">
                            <div id="step2Circle" style="width: 40px; height: 40px; border-radius: 50%; background: white; border: 3px solid #e5e7eb; display: flex; align-items: center; justify-content: center; color: #9ca3af; font-weight: 600; font-size: 14px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: all 0.3s ease;">2</div>
                            <span id="step2Text" style="margin-top: 8px; font-size: 0.75rem; font-weight: 500; color: #9ca3af;">Module Access</span>
                        </div>
                        
                        <!-- Step 3 -->
                        <div style="display: flex; flex-direction: column; align-items: center; position: relative; z-index: 1; flex: 1;">
                            <div id="step3Circle" style="width: 40px; height: 40px; border-radius: 50%; background: white; border: 3px solid #e5e7eb; display: flex; align-items: center; justify-content: center; color: #9ca3af; font-weight: 600; font-size: 14px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: all 0.3s ease;">3</div>
                            <span id="step3Text" style="margin-top: 8px; font-size: 0.75rem; font-weight: 500; color: #9ca3af;">Credentials</span>
                        </div>
                        
                        <!-- Step 4 -->
                        <div style="display: flex; flex-direction: column; align-items: center; position: relative; z-index: 1; flex: 1;">
                            <div id="step4Circle" style="width: 40px; height: 40px; border-radius: 50%; background: white; border: 3px solid #e5e7eb; display: flex; align-items: center; justify-content: center; color: #9ca3af; font-weight: 600; font-size: 14px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); transition: all 0.3s ease;">4</div>
                            <span id="step4Text" style="margin-top: 8px; font-size: 0.75rem; font-weight: 500; color: #9ca3af;">Confirmation</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal Body (Form) -->
            <form id="addStaffForm" action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding: 24px; max-height: 60vh; overflow-y: auto;">
                    
                    <!-- STEP 1: Staff Info -->
                    <div id="step1Content" class="step-content">
                        <h4 style="font-size: 1.125rem; font-weight: 600; color: #111827; margin-bottom: 20px;">Staff Information</h4>
                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px;">
                            
                            <!-- Full Name -->
                            <div>
                                <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                    Full Name <span style="color: #ef4444;">*</span>
                                </label>
                                <input type="text" 
                                       name="name" 
                                       id="staff_name"
                                       style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                       placeholder="Enter full name"
                                       required>
                            </div>
                            
                            <!-- Phone -->
                            <div>
                                <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                    Phone Number <span style="color: #ef4444;">*</span>
                                </label>
                                <input type="tel" 
                                       name="phone" 
                                       id="staff_phone"
                                       style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                       placeholder="+1 234-567-8900"
                                       required>
                            </div>
                            
                            <!-- Email -->
                            <div>
                                <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                    Email Address <span style="color: #ef4444;">*</span>
                                </label>
                                <input type="email" 
                                       name="email" 
                                       id="staff_email"
                                       style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                       placeholder="email@example.com"
                                       required>
                            </div>
                            
                            <!-- Hire Date -->
                            <div>
                                <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                    Hire Date <span style="color: #ef4444;">*</span>
                                </label>
                                <input type="date" 
                                       name="hire_date" 
                                       id="staff_hire_date"
                                       style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                       required>
                            </div>
                            
                            <!-- Status -->
                            <div>
                                <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                    Status <span style="color: #ef4444;">*</span>
                                </label>
                                <div class="custom-dropdown" style="position: relative; width: 100%;">
                                    <input type="hidden" name="status" id="add_staff_status_value" required>
                                    <div class="custom-dropdown-selected" 
                                         onclick="toggleDropdown('add_staff_status_dropdown')"
                                         style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background: white; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                                        <span id="add_staff_status_display" style="color: #9ca3af; font-weight: 500;">Select Status</span>
                                        <span style="color: #6b7280; font-size: 0.75rem;">▼</span>
                                    </div>
                                    <div id="add_staff_status_dropdown" class="custom-dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; right: 0; margin-top: 4px; background: white; border: 1px solid #d1d5db; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-height: 250px; overflow-y: auto; z-index: 1000;">
                                        <div class="custom-dropdown-item" onclick="selectStaffStatus('add_staff', 'Active')" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                                            <div style="font-weight: 500; color: #111827;">Active</div>
                                        </div>
                                        <div class="custom-dropdown-item" onclick="selectStaffStatus('add_staff', 'On Leave')" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                                            <div style="font-weight: 500; color: #111827;">On Leave</div>
                                        </div>
                                        <div class="custom-dropdown-item" onclick="selectStaffStatus('add_staff', 'Inactive')" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s;">
                                            <div style="font-weight: 500; color: #111827;">Inactive</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Profile Picture -->
                            <div style="grid-column: 1 / -1;">
                                <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                    Profile Picture
                                </label>
                                <input type="file" 
                                       name="photo" 
                                       id="staff_photo"
                                       accept="image/*"
                                       style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;">
                                <p style="font-size: 0.75rem; color: #6b7280; margin-top: 4px; margin-bottom: 0;">Recommended size: 500x500px. Max file size: 2MB</p>
                            </div>
                            
                            <!-- Address -->
                            <div style="grid-column: 1 / -1;">
                                <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                    Address
                                </label>
                                <textarea name="address" 
                                          id="staff_address"
                                          rows="3"
                                          style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; resize: none;" 
                                          placeholder="Enter home address (optional)"></textarea>
                            </div>
                            
                        </div>
                    </div>
                    
                    <!-- STEP 2: Module Access -->
                    <div id="step2Content" class="step-content" style="display: none;">
                        <h4 style="font-size: 1.125rem; font-weight: 600; color: #111827; margin-bottom: 20px;">Module Access Permissions</h4>
                        <p style="font-size: 0.875rem; color: #6b7280; margin-bottom: 20px;">Select which modules this staff member can access</p>
                        
                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px;">
                            <!-- Dashboard -->
                            <div style="border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; display: flex; align-items: center; justify-content: space-between;">
                                <div>
                                    <h6 style="font-weight: 600; color: #111827; margin-bottom: 4px;">Dashboard</h6>
                                    <p style="font-size: 0.75rem; color: #6b7280; margin: 0;">View business metrics and analytics</p>
                                </div>
                                <label style="position: relative; display: inline-block; width: 50px; height: 26px;">
                                    <input type="checkbox" name="access_dashboard" style="opacity: 0; width: 0; height: 0;">
                                    <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; transition: .4s; border-radius: 26px;"></span>
                                </label>
                            </div>
                            
                            <!-- Orders -->
                            <div style="border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; display: flex; align-items: center; justify-content: space-between;">
                                <div>
                                    <h6 style="font-weight: 600; color: #111827; margin-bottom: 4px;">Orders</h6>
                                    <p style="font-size: 0.75rem; color: #6b7280; margin: 0;">Manage customer orders</p>
                                </div>
                                <label style="position: relative; display: inline-block; width: 50px; height: 26px;">
                                    <input type="checkbox" name="access_orders" style="opacity: 0; width: 0; height: 0;">
                                    <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; transition: .4s; border-radius: 26px;"></span>
                                </label>
                            </div>
                            
                            <!-- Products -->
                            <div style="border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; display: flex; align-items: center; justify-content: space-between;">
                                <div>
                                    <h6 style="font-weight: 600; color: #111827; margin-bottom: 4px;">Products</h6>
                                    <p style="font-size: 0.75rem; color: #6b7280; margin: 0;">View and manage products</p>
                                </div>
                                <label style="position: relative; display: inline-block; width: 50px; height: 26px;">
                                    <input type="checkbox" name="access_products" style="opacity: 0; width: 0; height: 0;">
                                    <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; transition: .4s; border-radius: 26px;"></span>
                                </label>
                            </div>
                            
                            <!-- Services -->
                            <div style="border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; display: flex; align-items: center; justify-content: space-between;">
                                <div>
                                    <h6 style="font-weight: 600; color: #111827; margin-bottom: 4px;">Services</h6>
                                    <p style="font-size: 0.75rem; color: #6b7280; margin: 0;">Manage laundry services</p>
                                </div>
                                <label style="position: relative; display: inline-block; width: 50px; height: 26px;">
                                    <input type="checkbox" name="access_services" style="opacity: 0; width: 0; height: 0;">
                                    <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; transition: .4s; border-radius: 26px;"></span>
                                </label>
                            </div>
                            
                            <!-- Inventory -->
                            <div style="border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; display: flex; align-items: center; justify-content: space-between;">
                                <div>
                                    <h6 style="font-weight: 600; color: #111827; margin-bottom: 4px;">Inventory</h6>
                                    <p style="font-size: 0.75rem; color: #6b7280; margin: 0;">Track inventory and stock</p>
                                </div>
                                <label style="position: relative; display: inline-block; width: 50px; height: 26px;">
                                    <input type="checkbox" name="access_inventory" style="opacity: 0; width: 0; height: 0;">
                                    <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; transition: .4s; border-radius: 26px;"></span>
                                </label>
                            </div>
                            
                            <!-- Expenses -->
                            <div style="border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; display: flex; align-items: center; justify-content: space-between;">
                                <div>
                                    <h6 style="font-weight: 600; color: #111827; margin-bottom: 4px;">Expenses</h6>
                                    <p style="font-size: 0.75rem; color: #6b7280; margin: 0;">View and approve expenses</p>
                                </div>
                                <label style="position: relative; display: inline-block; width: 50px; height: 26px;">
                                    <input type="checkbox" name="access_expenses" style="opacity: 0; width: 0; height: 0;">
                                    <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; transition: .4s; border-radius: 26px;"></span>
                                </label>
                            </div>
                            
                            <!-- Staff -->
                            <div style="border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; display: flex; align-items: center; justify-content: space-between;">
                                <div>
                                    <h6 style="font-weight: 600; color: #111827; margin-bottom: 4px;">Staff</h6>
                                    <p style="font-size: 0.75rem; color: #6b7280; margin: 0;">Manage staff members</p>
                                </div>
                                <label style="position: relative; display: inline-block; width: 50px; height: 26px;">
                                    <input type="checkbox" name="access_staff" style="opacity: 0; width: 0; height: 0;">
                                    <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; transition: .4s; border-radius: 26px;"></span>
                                </label>
                            </div>
                            
                            <!-- POS -->
                            <div style="border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; display: flex; align-items: center; justify-content: space-between;">
                                <div>
                                    <h6 style="font-weight: 600; color: #111827; margin-bottom: 4px;">POS</h6>
                                    <p style="font-size: 0.75rem; color: #6b7280; margin: 0;">Access point of sale</p>
                                </div>
                                <label style="position: relative; display: inline-block; width: 50px; height: 26px;">
                                    <input type="checkbox" name="access_pos" style="opacity: 0; width: 0; height: 0;">
                                    <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; transition: .4s; border-radius: 26px;"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- STEP 3: Create Staff Credentials -->
                    <div id="step3Content" class="step-content" style="display: none;">
                        <h4 style="font-size: 1.125rem; font-weight: 600; color: #111827; margin-bottom: 20px;">Create Login Credentials</h4>
                        <p style="font-size: 0.875rem; color: #6b7280; margin-bottom: 20px;">Set up login credentials for this staff member</p>
                        
                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px;">
                            <!-- Username -->
                            <div>
                                <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                    Username <span style="color: #ef4444;">*</span>
                                </label>
                                <input type="text" 
                                       name="username" 
                                       id="staff_username"
                                       style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                       placeholder="Choose a unique username"
                                       required>
                                <p style="font-size: 0.75rem; color: #6b7280; margin-top: 4px; margin-bottom: 0;">This will be used for login</p>
                            </div>
                            
                            <!-- Auto-generate Username Button -->
                            <div style="display: flex; align-items: flex-end;">
                                <button type="button" 
                                        onclick="generateUsername()"
                                        style="padding: 10px 24px; border: 1px solid var(--primary); border-radius: 8px; color: var(--primary); background: white; cursor: pointer; font-weight: 500; font-size: 0.875rem; height: 42px;">
                                    Auto-generate from Name
                                </button>
                            </div>
                            
                            <!-- Password -->
                            <div>
                                <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                    Password <span style="color: #ef4444;">*</span>
                                </label>
                                <input type="password" 
                                       name="password" 
                                       id="staff_password"
                                       style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                       placeholder="Create a strong password"
                                       required>
                                <p style="font-size: 0.75rem; color: #6b7280; margin-top: 4px; margin-bottom: 0;">Minimum 8 characters</p>
                            </div>
                            
                            <!-- Confirm Password -->
                            <div>
                                <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                    Confirm Password <span style="color: #ef4444;">*</span>
                                </label>
                                <input type="password" 
                                       name="password_confirmation" 
                                       id="staff_password_confirm"
                                       style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                       placeholder="Re-enter password"
                                       required>
                            </div>
                            
                            <!-- Send Credentials via Email -->
                            <div style="grid-column: 1 / -1; background-color: #eff6ff; border: 1px solid #93c5fd; border-radius: 8px; padding: 16px;">
                                <label style="display: flex; align-items: center; cursor: pointer;">
                                    <input type="checkbox" name="send_credentials_email" id="send_credentials" checked style="width: 18px; height: 18px; margin-right: 12px; cursor: pointer;">
                                    <div>
                                        <span style="font-weight: 600; color: #111827; display: block;">Send credentials via email</span>
                                        <span style="font-size: 0.75rem; color: #6b7280;">Staff member will receive login details at their registered email address</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- STEP 4: Confirmation -->
                    <div id="step4Content" class="step-content" style="display: none;">
                        <div style="text-align: center; padding: 40px 20px;">
                            <div style="width: 80px; height: 80px; background: #dcfce7; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <h4 style="font-size: 1.5rem; font-weight: 600; color: #111827; margin-bottom: 12px;">Review & Confirm</h4>
                            <p style="font-size: 0.875rem; color: #6b7280; margin-bottom: 32px;">Please review the information below before adding the staff member</p>
                            
                            <!-- Summary Cards -->
                            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; text-align: left;">
                                <!-- Staff Info Summary -->
                                <div style="background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; padding: 20px;">
                                    <h6 style="font-weight: 600; color: #111827; margin-bottom: 12px; font-size: 0.875rem;">Staff Information</h6>
                                    <div style="font-size: 0.75rem; color: #6b7280; line-height: 1.8;">
                                        <div><strong>Name:</strong> <span id="confirm_name">-</span></div>
                                        <div><strong>Email:</strong> <span id="confirm_email">-</span></div>
                                        <div><strong>Phone:</strong> <span id="confirm_phone">-</span></div>
                                        <div><strong>Status:</strong> <span id="confirm_status">-</span></div>
                                    </div>
                                </div>
                                
                                <!-- Module Access Summary -->
                                <div style="background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; padding: 20px;">
                                    <h6 style="font-weight: 600; color: #111827; margin-bottom: 12px; font-size: 0.875rem;">Module Access</h6>
                                    <div id="confirm_modules" style="font-size: 0.75rem; color: #6b7280; line-height: 1.8;">
                                        <em>No modules selected</em>
                                    </div>
                                </div>
                                
                                <!-- Credentials Summary -->
                                <div style="background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; padding: 20px;">
                                    <h6 style="font-weight: 600; color: #111827; margin-bottom: 12px; font-size: 0.875rem;">Login Credentials</h6>
                                    <div style="font-size: 0.75rem; color: #6b7280; line-height: 1.8;">
                                        <div><strong>Username:</strong> <span id="confirm_username">-</span></div>
                                        <div><strong>Password:</strong> ••••••••</div>
                                        <div id="confirm_email_send" style="margin-top: 12px; padding: 8px; background: #dcfce7; border-radius: 4px; color: #166534; display: none;">
                                            ✓ Credentials will be emailed
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Modal Footer -->
                <div style="display: flex; align-items: center; justify-content: space-between; padding: 24px; border-top: 1px solid #e5e7eb; background-color: #f9fafb; border-radius: 0 0 12px 12px;">
                    <button type="button" 
                            id="prevBtn"
                            onclick="changeStep(-1)"
                            style="padding: 10px 24px; border: 1px solid #d1d5db; border-radius: 8px; color: #374151; background: white; cursor: pointer; font-weight: 500; font-size: 1rem; display: none;">
                        ← Previous
                    </button>
                    
                    <div style="flex: 1;"></div>
                    
                    <button type="button" 
                            onclick="closeAddStaffModal()"
                            style="padding: 10px 24px; border: 1px solid #d1d5db; border-radius: 8px; color: #374151; background: white; cursor: pointer; font-weight: 500; font-size: 1rem; margin-right: 12px;">
                        Cancel
                    </button>
                    <button type="button" 
                            id="nextBtn"
                            onclick="changeStep(1)"
                            style="padding: 10px 24px; background-color: var(--primary); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 500; font-size: 1rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); transition: all 0.3s ease;"
                            onmouseover="this.style.backgroundColor='var(--primary-hover)'" 
                            onmouseout="this.style.backgroundColor='var(--primary)'">
                        Next Step →
                    </button>
                    <button type="submit" 
                            id="submitBtn"
                            style="padding: 10px 24px; background-color: var(--primary); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 500; font-size: 1rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); transition: all 0.3s ease; display: none;"
                            onmouseover="this.style.backgroundColor='var(--primary-hover)'" 
                            onmouseout="this.style.backgroundColor='var(--primary)'">
                        Create Staff Member
                    </button>
                </div>
            </form>
            
        </div>
    </div>
</div>

<style>
    /* Toggle Switch Styles */
    input[type="checkbox"]:checked + span {
        background-color: var(--primary) !important;
    }
    input[type="checkbox"]:checked + span:before {
        transform: translateX(24px);
    }
    input[type="checkbox"] + span:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }
</style>
