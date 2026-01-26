<!-- Edit Expense Modal -->
<div id="editExpenseModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; background-color: rgba(0, 0, 0, 0.5); align-items: center; justify-content: center;">
    <!-- Modal Content -->
    <div style="background: white; border-radius: 12px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); width: 90%; max-width: 1400px; margin: auto; position: relative;">
            
            <!-- Modal Header -->
            <div style="padding: 24px; border-bottom: 1px solid #e5e7eb;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0;">
                    <h3 style="font-size: 1.25rem; font-weight: 600; color: #111827; margin: 0;">Edit Expense</h3>
                    <button type="button" onclick="closeEditExpenseModal()" style="background: none; border: none; color: #9ca3af; cursor: pointer; font-size: 24px; line-height: 1; padding: 0;">
                        ×
                    </button>
                </div>
            </div>
            
            <!-- Modal Body (Form) -->
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit_exp_id">
                
                <div style="padding: 24px; max-height: 70vh; overflow-y: auto;">
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px;">
                        
                        <!-- Expense Name -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Expense Name <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="text" 
                                   name="expense_name" 
                                   id="edit_exp_description"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                   placeholder="e.g., Water & Sewage"
                                   required>
                        </div>
                        
                        <!-- Date -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Date <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="date" 
                                   name="date" 
                                   id="edit_exp_date"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                   required>
                        </div>
                        
                        <!-- Category -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Category <span style="color: #ef4444;">*</span>
                            </label>
                            <div class="custom-dropdown" style="position: relative; width: 100%;">
                                <input type="hidden" name="category" id="edit_exp_category_value" required>
                                <div class="custom-dropdown-selected" 
                                     onclick="toggleDropdown('edit_exp_category_dropdown')"
                                     style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background: white; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                                    <span id="edit_exp_category_display" style="color: #9ca3af; font-weight: 500;">Select Category</span>
                                    <span style="color: #6b7280; font-size: 0.75rem;">▼</span>
                                </div>
                                <div id="edit_exp_category_dropdown" class="custom-dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; right: 0; margin-top: 4px; background: white; border: 1px solid #d1d5db; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-height: 250px; overflow-y: auto; z-index: 1000;">
                                    <div class="custom-dropdown-item" onclick="selectExpenseCategory('edit_exp', 'Utilities')" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                                        <div style="font-weight: 500; color: #111827;">Utilities</div>
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectExpenseCategory('edit_exp', 'Maintenance')" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                                        <div style="font-weight: 500; color: #111827;">Maintenance</div>
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectExpenseCategory('edit_exp', 'Supplies')" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                                        <div style="font-weight: 500; color: #111827;">Supplies</div>
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectExpenseCategory('edit_exp', 'Payroll')" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                                        <div style="font-weight: 500; color: #111827;">Payroll</div>
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectExpenseCategory('edit_exp', 'Marketing')" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                                        <div style="font-weight: 500; color: #111827;">Marketing</div>
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectExpenseCategory('edit_exp', 'Rent')" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                                        <div style="font-weight: 500; color: #111827;">Rent</div>
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectExpenseCategory('edit_exp', 'Insurance')" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                                        <div style="font-weight: 500; color: #111827;">Insurance</div>
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectExpenseCategory('edit_exp', 'Equipment')" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                                        <div style="font-weight: 500; color: #111827;">Equipment</div>
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectExpenseCategory('edit_exp', 'Transportation')" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s;">
                                        <div style="font-weight: 500; color: #111827;">Transportation</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Amount -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Amount <span style="color: #ef4444;">*</span>
                            </label>
                            <div style="position: relative;">
                                <span style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #6b7280;">$</span>
                                <input type="number" 
                                       name="amount" 
                                       id="edit_exp_amount"
                                       step="0.01"
                                       style="width: 100%; padding: 10px 16px 10px 32px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                       placeholder="0.00"
                                       required>
                            </div>
                        </div>
                        
                        <!-- Status -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Status <span style="color: #ef4444;">*</span>
                            </label>
                            <div class="custom-dropdown" style="position: relative; width: 100%;">
                                <input type="hidden" name="status" id="edit_exp_status_value" required>
                                <div class="custom-dropdown-selected" 
                                     onclick="toggleDropdown('edit_exp_status_dropdown')"
                                     style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background: white; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                                    <span id="edit_exp_status_display" style="color: #9ca3af; font-weight: 500;">Select Status</span>
                                    <span style="color: #6b7280; font-size: 0.75rem;">▼</span>
                                </div>
                                <div id="edit_exp_status_dropdown" class="custom-dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; right: 0; margin-top: 4px; background: white; border: 1px solid #d1d5db; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-height: 250px; overflow-y: auto; z-index: 1000;">
                                    <div class="custom-dropdown-item" onclick="selectExpenseStatus('edit_exp', 'Pending')" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                                        <div style="font-weight: 500; color: #111827;">Pending</div>
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectExpenseStatus('edit_exp', 'Approved')" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s; border-bottom: 1px solid #f3f4f6;">
                                        <div style="font-weight: 500; color: #111827;">Approved</div>
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectExpenseStatus('edit_exp', 'Rejected')" style="padding: 12px 16px; cursor: pointer; transition: background 0.2s;">
                                        <div style="font-weight: 500; color: #111827;">Rejected</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Approved By -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Approved By
                            </label>
                            <input type="text" 
                                   name="approved_by" 
                                   id="edit_exp_approved_by"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                   placeholder="Approver name (optional)">
                            <p style="font-size: 0.75rem; color: #6b7280; margin-top: 4px; margin-bottom: 0;">Leave blank if not yet approved</p>
                        </div>
                        
                        <!-- Receipt/Invoice Upload -->
                        <div style="grid-column: 1 / -1;">
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Receipt / Invoice
                            </label>
                            <input type="file" 
                                   name="receipt" 
                                   accept="image/*,.pdf"
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;">
                            <p style="font-size: 0.75rem; color: #6b7280; margin-top: 4px; margin-bottom: 0;">Accepted formats: Images or PDF. Max file size: 5MB</p>
                        </div>
                        
                        <!-- Notes -->
                        <div style="grid-column: 1 / -1;">
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Additional Notes
                            </label>
                            <textarea name="notes" 
                                      id="edit_exp_notes"
                                      rows="3"
                                      style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; resize: none;" 
                                      placeholder="Enter any additional notes (optional)"></textarea>
                        </div>
                        
                    </div>
                </div>
                
                <!-- Modal Footer -->
                <div style="display: flex; align-items: center; justify-content: flex-end; gap: 12px; padding: 24px; border-top: 1px solid #e5e7eb; background-color: #f9fafb; border-radius: 0 0 12px 12px;">
                    <button type="button" 
                            onclick="closeEditExpenseModal()"
                            style="padding: 10px 24px; border: 1px solid #d1d5db; border-radius: 8px; color: #374151; background: white; cursor: pointer; font-weight: 500; font-size: 1rem;">
                        Cancel
                    </button>
                    <button type="submit" 
                            style="padding: 10px 24px; background-color: var(--primary); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 500; font-size: 1rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); transition: all 0.3s ease;"
                            onmouseover="this.style.backgroundColor='var(--primary-hover)'" 
                            onmouseout="this.style.backgroundColor='var(--primary)'">
                        Update Expense
                    </button>
                </div>
            </form>
            
        </div>
    </div>
</div>
