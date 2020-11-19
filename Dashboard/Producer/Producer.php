<?php
namespace Modules\Dashboard\Producer;
use App\Models\SaleDocument;
use Modules\Dashboard\Filters\FilterBySales;

class Producer{
    public function getSales(){
        $list = SaleDocument::select(SaleDocument::TABLE_NAME . '.*')
            ->whereNull(SaleDocument::TABLE_NAME . '.deleted_at')
            ->where(SaleDocument::TABLE_NAME . '.flag_active', SaleDocument::STATE_ACTIVE)
            ->get();
        $filterBySales = new FilterBySales();
        $filterBySales->saleFilter($list);
    }
}