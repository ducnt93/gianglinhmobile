<?php

Route::resource("categories", "CategoryAPIController");

Route::resource("fqsas", "FqsaAPIController");

Route::resource("contacts", "ContactAPIController");

Route::resource("unitPrices", "UnitPriceAPIController");

Route::resource("productTypes", "ProductTypeAPIController");

Route::resource("infoTypes", "InfoTypeAPIController");

Route::resource("suppliers", "SupplierAPIController");

Route::resource("statusLogins", "StatusLoginAPIController");

Route::resource("simCards", "SimCardAPIController");

Route::resource("shopByPrices", "ShopByPriceAPIController");

Route::resource("promotions", "PromotionAPIController");

Route::resource("products", "ProductAPIController");

Route::resource("payments", "PaymentAPIController");

Route::resource("orderDetails", "OrderDetailAPIController");

Route::resource("orders", "OrderAPIController");

Route::resource("newsTypes", "NewsTypeAPIController");

Route::resource("news", "NewsAPIController");

Route::resource("members", "MemberAPIController");

Route::resource("infos", "InfosAPIController");

Route::resource("accessories", "AccessoryAPIController");

Route::resource("accessoryTypes", "AccessoryTypeAPIController");

Route::resource("infoSuppliers", "InfoSupplierAPIController");

Route::resource("infoSupplierTypes", "InfoSupplierTypeAPIController");