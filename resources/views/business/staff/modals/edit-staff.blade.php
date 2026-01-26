<!-- Edit Staff Modal -->
<div id="editStaffModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; background-color: rgba(0, 0, 0, 0.5); align-items: center; justify-content: center;">
    <!-- Modal Content -->
    <div style="background: white; border-radius: 12px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); width: 90%; max-width: 1400px; margin: auto; position: relative;">
            
            <!-- Modal Header -->
            <div style="display: flex; align-items: center; justify-content: space-between; padding: 24px; border-bottom: 1px solid #e5e7eb;">
                <h3 style="font-size: 1.25rem; font-weight: 600; color: #111827; margin: 0;">Edit Staff Member</h3>
                <button type="button" onclick="closeEditStaffModal()" style="background: none; border: none; color: #9ca3af; cursor: pointer; font-size: 24px; line-height: 1; padding: 0;">
                    ×
                </button>
            </div>
            
            <!-- Modal Body (Form) -->
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit_staff_id">
                
                <div style="padding: 24px; max-height: 70vh; overflow-y: auto;">
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px;">
                        
                        <!-- Staff Name -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Full Name <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="edit_staff_name"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                   placeholder="Enter full name"
                                   required>
                        </div>
                        
                        <!-- Employee ID -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Employee ID <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="text" 
                                   name="employee_id" 
                                   id="edit_staff_employee_id"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                   placeholder="e.g., EMP-001"
                                   required>
                        </div>
                        
                        <!-- Position -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Position <span style="color: #ef4444;">*</span>
                            </label>
                            <div class="custom-dropdown" style="position: relative; width: 100%;">
                                <input type="hidden" name="position" id="edit_staff_position_value" required>
                                <div class="custom-dropdown-selected" 
                                     onclick="toggleDropdown('edit_staff_position_dropdown')"
                                     style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background: white; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                                    <span id="edit_staff_position_display" style="color: #9ca3af;">Select Position</span>
                                    <span style="color: #6b7280; font-size: 0.75rem;">▼</span>
                                </div>
                                <div id="edit_staff_position_dropdown" class="custom-dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; right: 0; margin-top: 4px; background: white; border: 1px solid #d1d5db; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-height: 250px; overflow-y: auto; z-index: 1000;">
                                    <div class="custom-dropdown-item" onclick="selectStaffPosition('edit_staff', 'Laundry Supervisor')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Laundry Supervisor</div>
                                    <div class="custom-dropdown-item" onclick="selectStaffPosition('edit_staff', 'Washing Specialist')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Washing Specialist</div>
                                    <div class="custom-dropdown-item" onclick="selectStaffPosition('edit_staff', 'Dry Cleaning Expert')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Dry Cleaning Expert</div>
                                    <div class="custom-dropdown-item" onclick="selectStaffPosition('edit_staff', 'Front Desk Manager')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Front Desk Manager</div>
                                    <div class="custom-dropdown-item" onclick="selectStaffPosition('edit_staff', 'Customer Service Rep')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Customer Service Rep</div>
                                    <div class="custom-dropdown-item" onclick="selectStaffPosition('edit_staff', 'Delivery Driver')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Delivery Driver</div>
                                    <div class="custom-dropdown-item" onclick="selectStaffPosition('edit_staff', 'Quality Control')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Quality Control</div>
                                    <div class="custom-dropdown-item" onclick="selectStaffPosition('edit_staff', 'Maintenance Tech')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Maintenance Tech</div>
                                    <div class="custom-dropdown-item" onclick="selectStaffPosition('edit_staff', 'Accountant')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Accountant</div>
                                    <div class="custom-dropdown-item" onclick="selectStaffPosition('edit_staff', 'Ironing Specialist')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Ironing Specialist</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Department -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Department <span style="color: #ef4444;">*</span>
                            </label>
                            <div class="custom-dropdown" style="position: relative; width: 100%;">
                                <input type="hidden" name="department" id="edit_staff_department_value" required>
                                <div class="custom-dropdown-selected" 
                                     onclick="toggleDropdown('edit_staff_department_dropdown')"
                                     style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background: white; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                                    <span id="edit_staff_department_display" style="color: #9ca3af;">Select Department</span>
                                    <span style="color: #6b7280; font-size: 0.75rem;">▼</span>
                                </div>
                                <div id="edit_staff_department_dropdown" class="custom-dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; right: 0; margin-top: 4px; background: white; border: 1px solid #d1d5db; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-height: 250px; overflow-y: auto; z-index: 1000;">
                                    <div class="custom-dropdown-item" onclick="selectStaffDepartment('edit_staff', 'Operations')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Operations</div>
                                    <div class="custom-dropdown-item" onclick="selectStaffDepartment('edit_staff', 'Customer Service')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Customer Service</div>
                                    <div class="custom-dropdown-item" onclick="selectStaffDepartment('edit_staff', 'Logistics')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Logistics</div>
                                    <div class="custom-dropdown-item" onclick="selectStaffDepartment('edit_staff', 'Maintenance')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Maintenance</div>
                                    <div class="custom-dropdown-item" onclick="selectStaffDepartment('edit_staff', 'Finance')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Finance</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Phone -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Phone Number <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="tel" 
                                   name="phone" 
                                   id="edit_staff_phone"
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
                                   id="edit_staff_email"
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
                                   id="edit_staff_hire_date"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                   required>
                        </div>
                        
                        <!-- Status -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Status <span style="color: #ef4444;">*</span>
                            </label>
                            <div class="custom-dropdown" style="position: relative; width: 100%;">
                                <input type="hidden" name="status" id="edit_staff_status_value" required>
                                <div class="custom-dropdown-selected" 
                                     onclick="toggleDropdown('edit_staff_status_dropdown')"
                                     style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background: white; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                                    <span id="edit_staff_status_display" style="color: #9ca3af;">Select Status</span>
                                    <span style="color: #6b7280; font-size: 0.75rem;">▼</span>
                                </div>
                                <div id="edit_staff_status_dropdown" class="custom-dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; right: 0; margin-top: 4px; background: white; border: 1px solid #d1d5db; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-height: 250px; overflow-y: auto; z-index: 1000;">
                                    <div class="custom-dropdown-item" onclick="selectStaffStatus('edit_staff', 'Active')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Active</div>
                                    <div class="custom-dropdown-item" onclick="selectStaffStatus('edit_staff', 'On Leave')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">On Leave</div>
                                    <div class="custom-dropdown-item" onclick="selectStaffStatus('edit_staff', 'Inactive')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Inactive</div>
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
                                   accept="image/*"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;">
                            <p style="font-size: 0.75rem; color: #6b7280; margin-top: 4px;">Recommended size: 500x500px. Max file size: 2MB</p>
                        </div>
                        
                        <!-- Address -->
                        <div style="grid-column: 1 / -1;">
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Address
                            </label>
                            <textarea name="address" 
                                      id="edit_staff_address"
                                      rows="3"
                                      style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; resize: none;" 
                                      placeholder="Enter home address (optional)"></textarea>
                        </div>
                        
                    </div>
                </div>
                
                <!-- Modal Footer -->
                <div style="display: flex; align-items: center; justify-content: flex-end; gap: 12px; padding: 24px; border-top: 1px solid #e5e7eb; background-color: #f9fafb; border-radius: 0 0 12px 12px;">
                    <button type="button" 
                            onclick="closeEditStaffModal()"
                            style="padding: 10px 24px; border: 1px solid #d1d5db; border-radius: 8px; color: #374151; background: white; cursor: pointer; font-weight: 500; font-size: 1rem;">
                        Cancel
                    </button>
                    <button type="submit" 
                            style="padding: 10px 24px; background-color: var(--primary); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 500; font-size: 1rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); transition: all 0.3s ease;"
                            onmouseover="this.style.backgroundColor='var(--primary-hover)'" 
                            onmouseout="this.style.backgroundColor='var(--primary)'">
                        Update Staff Member
                    </button>
                </div>
            </form>
            
        </div>
    </div>
</div>
