<!-- Main modal -->
<div id="detail-pickup{{ $pickup->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-auto max-w-screen h-full md:h-auto">
        
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Isi Detail Pickup No. {{ $pickup->id }}
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="detail-pickup{{ $pickup->id }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            
            <!-- Modal body -->
            <form action="/pick/{{ $pickup->id }}" method="post">
                @csrf
                <div class="grid gap-4 mb-10" id="pickup-details{{ $pickup->id }}">
                    <div class="pickup-detail{{ $pickup->id }} flex items-center space-x-4">
                        <select name="pickup_details[0][category]" id="pickup_details[0][category]" class="@error('pickup_details[0][category]') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-auto p-2.5 category-select">
                            <option value="">Select Category</option>
                            @foreach ($categoriesOptions as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <select name="pickup_details[0][waste_price_id]" id="pickup_details[0][waste_price_id]" class="@error('pickup_details[0][waste_price_id]') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-auto p-2.5 waste-select">
                            <option value="">Select Waste</option>
                        </select>
                        <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-48 p-2.5 waste-price-unit">Rp - / -</div>
                        <input type="number" name="pickup_details[0][qty]" id="pickup_details[0][qty]" placeholder="Qty" class="@error('pickup_details[0][qty]') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-24 p-2.5 qty-input" min="0" step="1"/>
                        <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-48 p-2.5 total">Total : Rp -</div>
                        <button type="button" class="add-row{{ $pickup->id }} bg-green-500 text-white rounded-lg px-4 py-2">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                            </svg>
                        </button>
                    </div>
                </div>
        
                <button type="submit" class="text-white inline-flex items-center bg-design-primary hover:bg-green-200 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-4">
                    <svg class="mr-1 -ml-1 w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                    </svg>
                    Setor
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let pickupId = {{ $pickup->id }};
        let detailIndex = 1;

        const wasteOptions = @json($wastesOptions);

        // Waste Select
        function updateWasteOptions(selectElement, selectedCategory) {
            const wasteSelect = selectElement.closest('.pickup-detail' + pickupId).querySelector('.waste-select');
            wasteSelect.innerHTML = '<option value="">Select Waste</option>';
            if (selectedCategory && wasteOptions[selectedCategory]) {
                wasteOptions[selectedCategory].forEach(option => {
                    const opt = document.createElement('option');
                    opt.value = option.id;
                    opt.textContent = option.waste.name;
                    wasteSelect.appendChild(opt);
                });
            }
        }

        // Update WastePrice and Total
        function updateWasteDetails(selectElement) {
            const wasteId = selectElement.value;
            const detailsDiv = selectElement.closest('.pickup-detail' + pickupId);
            const wastePriceDiv = detailsDiv.querySelector('.waste-price-unit');
            const totalDiv = detailsDiv.querySelector('.total');
            const qtyInput = detailsDiv.querySelector('.qty-input');
            const waste = wasteOptions[detailsDiv.querySelector('select.category-select').value]?.find(w => w.id == wasteId);

            if (waste) {
                wastePriceDiv.textContent = `Rp ${waste.price} / ${waste.waste.unit}`;
                const qty = qtyInput.value || 0;
                const total = waste.price * qty;
                totalDiv.textContent = `Total: Rp ${total}`;
            } else {
                wastePriceDiv.textContent = 'Rp - / -';
                totalDiv.textContent = 'Total: Rp -';
            }
        }

        // Add New Row
        document.querySelector('.add-row' + pickupId).addEventListener('click', function () {
            const newRow = document.createElement('div');
            newRow.className = 'pickup-detail' + pickupId + ' flex items-center space-x-4 mt-2';
            
            // Populate the newRow with the HTML structure
            newRow.innerHTML = `
                <select name="pickup_details[${detailIndex}][category]" id="pickup_details[${detailIndex}][category]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-auto p-2.5 category-select">
                    <option value="">Select Category</option>
                    @foreach ($categoriesOptions as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <select name="pickup_details[${detailIndex}][waste_price_id]" id="pickup_details[${detailIndex}][waste_price_id]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-auto p-2.5 waste-select">
                    <option value="">Select Waste</option>
                </select>
                <div id="waste_price_${detailIndex}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-48 p-2.5 waste-price-unit">Rp - / -</div>
                <input type="number" name="pickup_details[${detailIndex}][qty]" id="pickup_details[${detailIndex}][qty]" placeholder="Qty" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-24 p-2.5 qty-input" min="0" step="1"/>
                <div id="total_${detailIndex}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-48 p-2.5 total">Total : Rp -</div>
                <button type="button" class="remove-row bg-red-500 text-white rounded-lg px-4 py-2">
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/>
                    </svg>
                </button>
            `;

            document.getElementById('pickup-details' + pickupId).appendChild(newRow);

            // Add event listeners to the new elements
            newRow.querySelector('.category-select').addEventListener('change', function () {
                updateWasteOptions(this, this.value);
            });

            newRow.querySelector('.waste-select').addEventListener('change', function () {
                updateWasteDetails(this);
            });

            newRow.querySelector('.qty-input').addEventListener('input', function () {
                updateWasteDetails(newRow.querySelector('.waste-select'));
            });

            newRow.querySelector('.remove-row').addEventListener('click', function () {
                newRow.remove();
            });

            detailIndex++;
        });

        // Initial event listeners for existing elements
        document.querySelectorAll('.category-select').forEach(function(selectElement) {
            selectElement.addEventListener('change', function () {
                updateWasteOptions(this, this.value);
            });
        });

        document.querySelectorAll('.waste-select').forEach(function(selectElement) {
            selectElement.addEventListener('change', function () {
                updateWasteDetails(this);
            });
        });

        document.querySelectorAll('.qty-input').forEach(function(inputElement) {
            inputElement.addEventListener('input', function () {
                updateWasteDetails(this.closest('.pickup-detail' + pickupId).querySelector('.waste-select'));
            });
        });
    });
</script>