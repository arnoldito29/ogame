<?php

namespace App\Services;

use App\Modules\ObjectLink;
use voku\helper\HtmlDomParser;

class ObjectLinkService
{
    public function __construct(ObjectLink $objectLink, FlatService $flatService)
    {
        $this->objectLink = $objectLink;
        $this->flatService = $flatService;
    }

    public function getObjects()
    {
        return $this->objectLink::orderBy('id', 'ASC')->get();
    }

    public function addItem(array $requestDsta)
    {
        $item = new Birthday();
        $item->name = $requestDsta['name'];
        $item->birthday = $requestDsta['birthday'];

        return $item->save();
    }

    public function updateItem(Birthday $item, array $requestDsta)
    {
        $item->name = $requestDsta['name'];
        $item->birthday = $requestDsta['birthday'];

        return $item->save();
    }

    public function getObjectLinks()
    {
        $items = $this->getObjects();

        if ($items->count() > 0) {
            foreach ($items as $item) {
                $data = file_get_contents($item->link);
                $html = HtmlDomParser::str_get_html($data);
                if ($html) {
                    $list = $html->find('.list-row');
                    foreach ($list as $key => $listItem) {
                        $link = $this->getLink($listItem);
                        $id = $this->getId($link);
                        $name = $this->getName($listItem);
                        $size = $this->getSize($listItem);
                        $price = $this->getPrice($listItem);

                        if ($price > 0) {
                            $insertData = [
                                'name' => $name,
                                'full_name' => $name,
                                'size' => $size,
                                'link' => $link,
                                'ad_id' => $id,
                                'price' => $price,
                                'object_id' => $item->id
                            ];

                            $this->flatService->addFlat($insertData);
                        }
                    }
                }
            }
        }
    }

    public function getLink($element)
    {
        $link = '';
        $foto = $element->findOne('.list-photo');

        if ($foto) {
            $linkAll = $foto->findOne('a');

            if ($linkAll) {
                $linkA = $linkAll->getAllAttributes();
                $link = $linkA['href'];
            }
        }

        return $link;
    }

    public function getId($link)
    {
        $id = 0;

        $list = explode('-', $link);
        $id = (int)end($list);

        return $id;
    }

    public function getSize($element)
    {
        $size = 0;

        $area = $element->findOne('.list-AreaOverall');

        if ($area) {
            return floatval($area->nodeValue);
        }

        return $size;
    }

    public function getPrice($element)
    {
        $price = 0;
        $priceItem = $element->findOne('.list-item-price');

        if ($priceItem) {
            return floatval(str_replace(' ', '', $priceItem->nodeValue));
        }

        return $price;
    }

    public function getName($element)
    {
        $name = '';
        $string = $element->findOne('.list-adress');

        if ($string) {
            $nameSt = $string->findOne('h3');

            if ($nameSt) {
                return trim(strip_tags($nameSt->nodeValue));
            }
        }

        return $name;
    }
}
