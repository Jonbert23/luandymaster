<!-- Add Service Modal -->
<div id="addServiceModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; background-color: rgba(0, 0, 0, 0.5); align-items: center; justify-content: center;">
    <!-- Modal Content -->
    <div style="background: white; border-radius: 12px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); width: 90%; max-width: 800px; margin: auto; position: relative;">
            
            <!-- Modal Header -->
            <div style="display: flex; align-items: center; justify-content: space-between; padding: 24px; border-bottom: 1px solid #e5e7eb;">
                <h3 style="font-size: 1.25rem; font-weight: 600; color: #111827; margin: 0;">Add New Service</h3>
                <button type="button" onclick="closeAddServiceModal()" style="background: none; border: none; color: #9ca3af; cursor: pointer; font-size: 24px; line-height: 1; padding: 0;">
                    ×
                </button>
            </div>
            
            <!-- Modal Body (Form) -->
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding: 24px; max-height: 70vh; overflow-y: auto;">
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px;">
                        
                        <!-- Service Name -->
                        <div style="grid-column: 1 / -1;">
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Service Name <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                   placeholder="e.g., Wash & Fold"
                                   required>
                        </div>
                        
                        <!-- Service Type -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Service Type <span style="color: #ef4444;">*</span>
                            </label>
                            <div class="custom-dropdown" style="position: relative; width: 100%;">
                                <input type="hidden" name="type" id="add_service_type_value" required>
                                <div class="custom-dropdown-selected" 
                                     onclick="toggleDropdown('add_service_type_dropdown')"
                                     style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background: white; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                                    <span id="add_service_type_display" style="color: #9ca3af;">Select Type</span>
                                    <span style="color: #6b7280; font-size: 0.75rem;">▼</span>
                                </div>
                                <div id="add_service_type_dropdown" class="custom-dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; right: 0; margin-top: 4px; background: white; border: 1px solid #d1d5db; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-height: 250px; overflow-y: auto; z-index: 1000;">
                                    <div class="custom-dropdown-item" onclick="selectServiceType('add', 'Washing')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Washing</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceType('add', 'Dry Cleaning')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Dry Cleaning</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceType('add', 'Ironing')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Ironing</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceType('add', 'Specialty')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Specialty</div>
                                </div>
                            </div>
                        </div>

                        <!-- Service Unit -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Service Unit <span style="color: #ef4444;">*</span>
                            </label>
                            <div class="custom-dropdown" style="position: relative; width: 100%;">
                                <input type="hidden" name="unit" id="add_service_unit_value" required>
                                <div class="custom-dropdown-selected" 
                                     onclick="toggleDropdown('add_service_unit_dropdown')"
                                     style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background: white; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                                    <span id="add_service_unit_display" style="color: #9ca3af;">Select Unit</span>
                                    <span style="color: #6b7280; font-size: 0.75rem;">▼</span>
                                </div>
                                <div id="add_service_unit_dropdown" class="custom-dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; right: 0; margin-top: 4px; background: white; border: 1px solid #d1d5db; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-height: 250px; overflow-y: auto; z-index: 1000;">
                                    <div class="custom-dropdown-item" onclick="selectServiceUnit('add', 'Per Kilo')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Per Kilo</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceUnit('add', 'Per Load')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Per Load</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceUnit('add', 'Per Piece')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Per Piece</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceUnit('add', 'Per Meter')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Per Meter</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceUnit('add', 'Per Sq. Ft.')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Per Sq. Ft.</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceUnit('add', 'Per Pair')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Per Pair</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceUnit('add', 'Per Set')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;">Per Set</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Price -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Price <span style="color: #ef4444;">*</span>
                            </label>
                            <div style="position: relative;">
                                <span style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #6b7280;">$</span>
                                <input type="number" 
                                       name="price" 
                                       step="0.01"
                                       style="width: 100%; padding: 10px 16px 10px 32px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                       placeholder="0.00"
                                       required>
                            </div>
                        </div>
                        
                        <!-- Duration -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Duration <span style="color: #ef4444;">*</span>
                            </label>
                            <input type="text" 
                                   name="duration" 
                                   style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;" 
                                   placeholder="e.g., 24 hours"
                                   required>
                        </div>

                        <!-- Icon Selection -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Icon <span style="color: #ef4444;">*</span>
                            </label>
                            <div class="custom-dropdown" style="position: relative; width: 100%;">
                                <input type="hidden" name="icon" id="add_service_icon_value" required>
                                <div class="custom-dropdown-selected" 
                                     onclick="toggleDropdown('add_service_icon_dropdown')"
                                     style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background: white; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                                    <span id="add_service_icon_display" style="color: #9ca3af;">Select Icon</span>
                                    <span style="color: #6b7280; font-size: 0.75rem;">▼</span>
                                </div>
                                <div id="add_service_icon_dropdown" class="custom-dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; right: 0; margin-top: 4px; background: white; border: 1px solid #d1d5db; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-height: 250px; overflow-y: auto; z-index: 1000;">
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-tshirt', 'T-Shirt')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-tshirt" style="margin-right: 10px;"></i> T-Shirt</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-user-tie', 'Suit')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-user-tie" style="margin-right: 10px;"></i> Suit</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-fire', 'Iron')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-fire" style="margin-right: 10px;"></i> Iron</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-bolt', 'Express')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-bolt" style="margin-right: 10px;"></i> Express</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-bed', 'Bedding')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-bed" style="margin-right: 10px;"></i> Bedding</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-cut', 'Alteration')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-cut" style="margin-right: 10px;"></i> Alteration</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-spray-can', 'Stain')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-spray-can" style="margin-right: 10px;"></i> Stain</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-briefcase', 'Leather')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-briefcase" style="margin-right: 10px;"></i> Leather</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-ring', 'Wedding')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-ring" style="margin-right: 10px;"></i> Wedding</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-home', 'Curtain')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-home" style="margin-right: 10px;"></i> Curtain</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-shoe-prints', 'Shoe')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-shoe-prints" style="margin-right: 10px;"></i> Shoe</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-rug', 'Carpet')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-rug" style="margin-right: 10px;"></i> Carpet</div>
                                    
                                    <!-- New Laundry Related Icons -->
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-soap', 'Detergent')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-soap" style="margin-right: 10px;"></i> Detergent</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-water', 'Wash')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-water" style="margin-right: 10px;"></i> Wash</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-temperature-high', 'Hot Wash')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-temperature-high" style="margin-right: 10px;"></i> Hot Wash</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-wind', 'Dry')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-wind" style="margin-right: 10px;"></i> Dry</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-hands-wash', 'Hand Wash')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-hands-wash" style="margin-right: 10px;"></i> Hand Wash</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-box-open', 'Folded')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-box-open" style="margin-right: 10px;"></i> Folded</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-tags', 'Labeling')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-tags" style="margin-right: 10px;"></i> Labeling</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-truck', 'Delivery')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-truck" style="margin-right: 10px;"></i> Delivery</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-stopwatch', 'Express Time')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-stopwatch" style="margin-right: 10px;"></i> Express Time</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-socks', 'Socks')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-socks" style="margin-right: 10px;"></i> Socks</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-mitten', 'Gloves')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-mitten" style="margin-right: 10px;"></i> Gloves</div>
                                    <div class="custom-dropdown-item" onclick="selectServiceIcon('add', 'fa-hat-cowboy', 'Hats')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s;"><i class="fas fa-hat-cowboy" style="margin-right: 10px;"></i> Hats</div>
                                </div>
                            </div>
                        </div>

                        <!-- Icon Color Selection -->
                        <div>
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Icon Color <span style="color: #ef4444;">*</span>
                            </label>
                            <div class="custom-dropdown" style="position: relative; width: 100%;">
                                <input type="hidden" name="icon_bg" id="add_service_icon_bg_value" required value="#2769ee">
                                <div class="custom-dropdown-selected" 
                                     onclick="toggleDropdown('add_service_icon_bg_dropdown')"
                                     style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; background: white; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                                    <span id="add_service_icon_bg_display" style="display: flex; align-items: center; color: #111827;">
                                        <span style="display: inline-block; width: 20px; height: 20px; border-radius: 4px; background-color: #2769ee; margin-right: 8px;"></span>
                                        Blue
                                    </span>
                                    <span style="color: #6b7280; font-size: 0.75rem;">▼</span>
                                </div>
                                <div id="add_service_icon_bg_dropdown" class="custom-dropdown-menu" style="display: none; position: absolute; top: 100%; left: 0; right: 0; margin-top: 4px; background: white; border: 1px solid #d1d5db; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-height: 250px; overflow-y: auto; z-index: 1000;">
                                    <div class="custom-dropdown-item" onclick="selectServiceColor('add', '#2769ee', 'Blue')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s; display: flex; align-items: center;">
                                        <span style="display: inline-block; width: 20px; height: 20px; border-radius: 4px; background-color: #2769ee; margin-right: 8px;"></span> Blue
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectServiceColor('add', '#47ae3b', 'Green')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s; display: flex; align-items: center;">
                                        <span style="display: inline-block; width: 20px; height: 20px; border-radius: 4px; background-color: #47ae3b; margin-right: 8px;"></span> Green
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectServiceColor('add', '#8030d0', 'Purple')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s; display: flex; align-items: center;">
                                        <span style="display: inline-block; width: 20px; height: 20px; border-radius: 4px; background-color: #8030d0; margin-right: 8px;"></span> Purple
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectServiceColor('add', '#e1b746', 'Yellow')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s; display: flex; align-items: center;">
                                        <span style="display: inline-block; width: 20px; height: 20px; border-radius: 4px; background-color: #e1b746; margin-right: 8px;"></span> Yellow
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectServiceColor('add', '#314c82', 'Navy')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s; display: flex; align-items: center;">
                                        <span style="display: inline-block; width: 20px; height: 20px; border-radius: 4px; background-color: #314c82; margin-right: 8px;"></span> Navy
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectServiceColor('add', '#676767', 'Gray')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s; display: flex; align-items: center;">
                                        <span style="display: inline-block; width: 20px; height: 20px; border-radius: 4px; background-color: #676767; margin-right: 8px;"></span> Gray
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectServiceColor('add', '#f94a4a', 'Red')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s; display: flex; align-items: center;">
                                        <span style="display: inline-block; width: 20px; height: 20px; border-radius: 4px; background-color: #f94a4a; margin-right: 8px;"></span> Red
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectServiceColor('add', '#ee9827', 'Orange')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s; display: flex; align-items: center;">
                                        <span style="display: inline-block; width: 20px; height: 20px; border-radius: 4px; background-color: #ee9827; margin-right: 8px;"></span> Orange
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectServiceColor('add', '#ee27c0', 'Pink')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s; display: flex; align-items: center;">
                                        <span style="display: inline-block; width: 20px; height: 20px; border-radius: 4px; background-color: #ee27c0; margin-right: 8px;"></span> Pink
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectServiceColor('add', '#27beee', 'Cyan')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s; display: flex; align-items: center;">
                                        <span style="display: inline-block; width: 20px; height: 20px; border-radius: 4px; background-color: #27beee; margin-right: 8px;"></span> Cyan
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectServiceColor('add', '#bec747', 'Lime')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s; display: flex; align-items: center;">
                                        <span style="display: inline-block; width: 20px; height: 20px; border-radius: 4px; background-color: #bec747; margin-right: 8px;"></span> Lime
                                    </div>
                                    <div class="custom-dropdown-item" onclick="selectServiceColor('add', '#7b25d1', 'Violet')" style="padding: 10px 16px; cursor: pointer; transition: background 0.2s; display: flex; align-items: center;">
                                        <span style="display: inline-block; width: 20px; height: 20px; border-radius: 4px; background-color: #7b25d1; margin-right: 8px;"></span> Violet
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Description -->
                        <div style="grid-column: 1 / -1;">
                            <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 8px;">
                                Description
                            </label>
                            <textarea name="description" 
                                      rows="3"
                                      style="width: 100%; padding: 10px 16px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; resize: none;" 
                                      placeholder="Enter service description (optional)"></textarea>
                        </div>
                        
                    </div>
                </div>
                
                <!-- Modal Footer -->
                <div style="display: flex; align-items: center; justify-content: flex-end; gap: 12px; padding: 24px; border-top: 1px solid #e5e7eb; background-color: #f9fafb; border-radius: 0 0 12px 12px;">
                    <button type="button" 
                            onclick="closeAddServiceModal()"
                            style="padding: 10px 24px; border: 1px solid #d1d5db; border-radius: 8px; color: #374151; background: white; cursor: pointer; font-weight: 500; font-size: 1rem;">
                        Cancel
                    </button>
                    <button type="submit" 
                            style="padding: 10px 24px; background-color: var(--primary); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 500; font-size: 1rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); transition: all 0.3s ease;"
                            onmouseover="this.style.backgroundColor='var(--primary-hover)'" 
                            onmouseout="this.style.backgroundColor='var(--primary)'">
                        Add Service
                    </button>
                </div>
            </form>
            
        </div>
    </div>
</div>