<style type="text/css">
    #barcode-img {
        filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);
        width: auto;
        max-width: 250px;
        max-height: 120px;
        display: none;
    }

    .img-wrapper {
        overflow: hidden;
    }
</style>
<x-pdf-layout>
    <div class="mx-auto mt-2 text-slate-700" style="width:1020px; background-color:#FEFEFE">
        <div class=" rounded-sm border border-slate-100">
            <div class="grid grid-cols-2 gap-1">
                <div>
                    <!-- SHIPPER START -->
                    <section>
                        <div class="bg-slate-100 text-sm font-semibold px-2 py-1 uppercase">
                            1. Shipper
                        </div>

                        <div class="grid grid-cols-1 mt-2">
                            <section>
                                <div class="text-center text-sm">
                                    ID Number
                                </div>
                                <div class="text-center font-medium">
                                    {{ $order->customer->cid }}
                                </div>
                            </section>
                        </div>

                        <hr class="mt-2">

                        <div class="grid grid-cols-2 mt-2">
                            <section>
                                <div class="text-center text-sm">
                                    Contact Name
                                </div>
                                <div class="text-center font-medium">
                                    {{ $order->customer->first_name }} {{ $order->customer->last_name }}
                                </div>
                            </section>

                            <section>
                                <div class="text-center text-sm">
                                    Phone Number
                                </div>
                                <div class="text-center font-medium">
                                    {{ $order->customer->mobile }}
                                </div>
                            </section>
                        </div>

                        <hr class="mt-2">

                        <div class="grid grid-cols-2 mt-2">
                            <section>
                                <div class="text-center text-sm">
                                    Country
                                </div>
                                <div class="text-center font-medium">
                                    {{ $order->customer->country->code }}
                                </div>
                            </section>
                            <section>
                                <div class="text-center text-sm">
                                    City
                                </div>
                                <div class="text-center font-medium">
                                    {{ $order->customer->city->name }}
                                </div>
                            </section>
                        </div>

                        <hr class="mt-2">

                        <div class="grid grid-cols-1 mt-2">
                            <section>
                                <div class="text-center text-sm">
                                    Address: region, state, province, street, house, flat
                                </div>
                                <div class="text-center font-medium">
                                    {{ $order->customer->address }}
                                </div>
                            </section>
                        </div>
                    </section>
                    <!-- SHIPPER  END -->
                </div>
                <div class="text-center">
                    <div class="bg-slate-100 text-sm font-medium px-2 py-1 uppercase ">
                        RODINA Express - International Delivery Services
                    </div>
                    <section>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="text-center text-sm mt-2">
                                    Order Number
                                </div>
                                <div class="text-center text-1xl font-medium">
                                    {{ $order->oid }}
                                </div>
                            </div>
                            <div>
                                <div class="text-center text-sm mt-2">
                                    Container Number
                                </div>
                                <div class="text-center text-1xl font-medium">
                                    @isset($order->container)
                                        {{ $order->container->container->cid }}
                                    @endisset
                                </div>
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="text-center text-sm mt-2">
                            Barcode
                        </div>
                        <div class="text-center font-medium">
                            {{--                            @foreach($order->barcodes as $barcode)--}}
                            {{--                                <span class="text-2xl">--}}
                            {{--                                    {{  $barcode->barcode }}--}}
                            {{--                                </span>--}}
                            {{--                            @endforeach--}}
                            <span class="text-xl">
                            {{  $order->barcode }}
                            </span>
                        </div>
                        <div class="img-wrapper flex justify-center">
                            <div id="barcode-img"></div>
                        </div>
                        <label class="btn p-0">
                            <input
                                tabindex="-1"
                                type="file"
                                id="fileupload"
                                class="pointer-events-none absolute inset-0 h-full w-full opacity-0"
                            />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5"
                                 stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                            </svg>

                        </label>

                    </section>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-1">
                <div class="mt-4">
                    <!-- CONSIGNEE START -->
                    <section>
                        <div class="bg-slate-100 text-sm font-semibold px-2 py-1 uppercase">
                            2. CONSIGNEE
                        </div>

                        {{--                        <div class="grid grid-cols-1 mt-2">--}}
                        {{--                            <section>--}}
                        {{--                                <div class="text-center text-sm">--}}
                        {{--                                    ID Number--}}
                        {{--                                </div>--}}
                        {{--                                <div class="text-center font-medium">--}}
                        {{--                                    {{ $order->oid }}--}}
                        {{--                                </div>--}}
                        {{--                            </section>--}}
                        {{--                        </div>--}}

                        {{--                        <hr class="mt-2">--}}

                        <div class="grid grid-cols-2 mt-2">
                            <section>
                                <div class="text-center text-sm">
                                    Contact Name
                                </div>
                                <div class="text-center font-medium">
                                    {{ $order->first_name }} {{ $order->last_name }}
                                </div>
                            </section>

                            <section>
                                <div class="text-center text-sm">
                                    Phone Number
                                </div>
                                <div class="text-center font-medium">
                                    {{ $order->mobile }}
                                </div>
                            </section>
                        </div>

                        <hr class="mt-2">

                        <div class="grid grid-cols-2 mt-2">
                            <section>
                                <div class="text-center text-sm">
                                    Country
                                </div>
                                <div class="text-center font-medium">
                                    {{ $order->country->code }}
                                </div>
                            </section>
                            <section>
                                <div class="text-center text-sm">
                                    City
                                </div>
                                <div class="text-center font-medium">
                                    {{ $order->city }}
                                </div>
                            </section>
                        </div>

                        <hr class="mt-2">

                        <div class="grid grid-cols-1 mt-2">
                            <section>
                                <div class="text-center text-sm">
                                    Address: region, state, province, street, house, flat
                                </div>
                                <div class="text-center font-medium">
                                    {{ $order->address }}
                                </div>
                            </section>
                        </div>
                    </section>
                    <!-- CONSIGNEE END -->
                </div>
                <div class="">
                    <!-- CONTENT START -->
                    <section class="mt-4">
                        <div class="bg-slate-100 text-sm font-semibold px-2 py-1 uppercase">
                            3. Shipment
                        </div>
                        <div class="mt-2">
                            <section>
                                <div class="text-center text-sm">
                                    Description of Content
                                </div>
                                <div class="text-center mt-2 text-sm font-medium">
                                    {{--                                    {{ $order->content }}--}}
                                    @if ($order->items->count() > 0)
                                        @php
                                            $itemStrings = [];
                                            foreach ($order->items as $item) {
                                                $itemStrings[] = "{$item->item} ({$item->qty})";
                                            }
                                            $itemsList = implode(', ', $itemStrings);
                                        @endphp
                                        {{ $itemsList }}
                                    @else
                                        No items
                                    @endif
                                </div>
                            </section>
                            <hr class="mt-2">
                            <div class="grid grid-cols-2 mt-2">
                                <section>
                                    <div class="text-center text-sm">
                                        Total Pakage/s
                                    </div>
                                    <div class="text-center font-medium">
                                        {{--                                        {{ $order->barcode }}--}}1
                                    </div>
                                </section>
                                <section>
                                    <div class="text-center text-sm">
                                        Dim Weight
                                    </div>
                                    <div class="text-center font-medium">
                                        {{ $order->weight_kg }} kg
                                        @if($order->weight_kg)
                                            {{ $order->weight_gr }} gr
                                        @endif
                                    </div>
                                </section>
                            </div>
                            <hr class="mt-2">
                            <div class="grid grid-cols-2 mt-2">
                                <section>
                                    <div class="text-center text-sm">
                                        Registration Date
                                    </div>
                                    <div class="text-center font-medium">
                                        {{ date('d/m/Y', strtotime($order->updated_at)) }}
                                    </div>
                                </section>
                                <section>
                                    <div class="text-center text-sm">
                                        Arrival Date
                                    </div>
                                    <div class="text-center font-medium ">
                                        <input type="text" class="w-24" style=" text-align:center;">
                                    </div>
                                </section>
                            </div>
                        </div>
                    </section>
                    <!-- CONTENT END -->
                </div>
            </div>
            <div class="grid grid-cols-2 gap-1">
                <div class="mt-4">
                    <!-- PAYMENT START -->
                    <section>
                        <div class="bg-slate-100 text-sm font-semibold px-2 py-1 uppercase">
                            4. PAYMENT
                        </div>

                        <div class="grid grid-cols-2 mt-4 pb-3">
                            <div class="text-sm flex items-center justify-center px-4">
                                <div class="text-sm flex items-center space-x-1 px-2">
                                    <input type="checkbox">
                                    <div class="font-medium">Shipper</div>
                                </div>
                                <div class="text-sm flex items-center space-x-1 px-2">
                                    <input type="checkbox">
                                    <div class="font-medium">Consignee</div>
                                </div>
                            </div>
                            <div class="text-sm flex items-center justify-center px-6">
                                <div class="text-sm flex items-center space-x-1 px-2">
                                    <input type="checkbox">
                                    <div class="font-medium">Cash</div>
                                </div>
                                <div class="text-sm flex items-center space-x-1 px-2">
                                    <input type="checkbox">
                                    <div class="font-medium">Cashless</div>
                                </div>
                            </div>

                        </div>

                    </section>
                    <hr class="mt-2">
                    <section>
                        <div class="text-center text-sm mt-2">
                            Additional Information
                        </div>
                        <div class="text-center ">
                            <textarea rows="2" class="w-full px-6 py-1" style="resize: none"></textarea>
                        </div>
                    </section>
                    <!-- PAYMENT END -->
                </div>
                <div class="mt-4">
                    <!-- SERVICES START -->
                    <section>
                        <div class="bg-slate-100 text-sm font-semibold px-2 py-1 uppercase">
                            5. SERVICES
                        </div>
                        <div class="mt-4 pb-3">
                            <div class="text-sm flex  items-center justify-center space-x-6">
                                <div class="text-sm flex items-center space-x-1 ">
                                    <input type="checkbox">
                                    <div class="font-medium">Parcels</div>
                                </div>
                                <div class="text-sm flex items-center space-x-1 ">
                                    <input type="checkbox">
                                    <div class="font-medium">Documents</div>
                                </div>
                                <div class="text-sm flex items-center space-x-1 ">
                                    <input type="checkbox">
                                    <div class="font-medium">Other</div>
                                </div>
                            </div>
                        </div>

                    </section>
                    <hr class="mt-2">
                    <section>
                        <div class="text-center text-sm mt-2">
                            Additional Information
                        </div>
                        <div class="text-center ">
                            <textarea rows="2" class="w-full px-6 py-1" style="resize: none"></textarea>
                        </div>
                    </section>
                    <!-- SERVICES END -->
                </div>
            </div>
            <div class="grid grid-cols-2 gap-1">
                <div>
                    <!-- COST START -->
                    <section class="mt-2 mb-2">
                        <div class="bg-slate-100 text-sm font-semibold px-2 py-1 uppercase">
                            6. Cost
                        </div>
                        <div class="mt-2">
                            <div class="grid grid-cols-2 mt-2">
                                <section>
                                    <div class="text-center text-sm">
                                        Declared Value
                                    </div>
                                    <div class="text-center font-medium">


                                        <div class="flex justify-center items-center space-x-1">
                                            <div>{{ $order->price }}</div>
                                            <select style="  -webkit-appearance: none;
  -moz-appearance: none;
  text-indent: 1px;
  text-overflow: '';">
                                                <option></option>
                                                <option>USD</option>
                                                <option>EUR</option>
                                                <option>NIS</option>
                                            </select>
                                        </div>
                                    </div>
                                </section>
                                <section>
                                    <div class="text-center text-sm">
                                        Shipping Cost
                                    </div>
                                    <div class="text-center font-medium">
                                        <div class="flex justify-center items-center space-x-1">
                                            <input type="text" style=" text-align:right;" class="w-8"/>
                                            <select style="  -webkit-appearance: none;
  -moz-appearance: none;
  text-indent: 1px;
  text-overflow: '';">
                                                <option></option>
                                                <option>USD</option>
                                                <option>EUR</option>
                                                <option>NIS</option>
                                            </select>
                                        </div>
                                    </div>
                                </section>
                            </div>

                            {{--                            <hr class="mt-2">--}}

                            {{--                            <div class="grid grid-cols-2 mt-2">--}}
                            {{--                                <section>--}}
                            {{--                                    <div class="text-center text-sm">--}}
                            {{--                                        Currency--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="text-center font-medium">--}}
                            {{--                                        NIS--}}
                            {{--                                    </div>--}}
                            {{--                                </section>--}}
                            {{--                                <section>--}}
                            {{--                                    <div class="text-center text-sm">--}}
                            {{--                                        Currency--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="text-center font-medium">--}}
                            {{--                                        USD--}}
                            {{--                                    </div>--}}
                            {{--                                </section>--}}
                            {{--                            </div>--}}

                        </div>
                    </section>
                    <!-- COST END -->
                </div>
                <div class="mt-2 text-center">
                    Consignee Signature
                    <div class="mt-6">
                        --------------------------------------------------
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-pdf-layout>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
    $(function () {
        $("#fileupload").change(function () {
            $("#barcode-img").html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            if (regex.test($(this).val().toLowerCase())) {
                if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
                    $("#barcode-img ").show();
                    $("#barcode-img ")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
                } else {
                    if (typeof (FileReader) != "undefined") {
                        $("#barcode-img ").show();
                        $("#barcode-img ").append("<img />");
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $("#barcode-img  img").attr("src", e.target.result);
                        }
                        reader.readAsDataURL($(this)[0].files[0]);
                    } else {
                        alert("This browser does not support FileReader.");
                    }
                }
            } else {
                alert("Please upload a valid image file.");
            }
        });
    });
</script>
