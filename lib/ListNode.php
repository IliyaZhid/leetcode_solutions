<?php
namespace LeetcodeSolutions;

class ListNode {
    public int $val = 0;
    public ListNode|null $next = null;

    public function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }

    public static function arrayToList($array) {
        if (empty($array)) {
            return null;
        }

        // Создаем головной узел
        $head = new ListNode($array[0]);
        $current = $head;

        // Проходим по оставшимся элементам массива
        for ($i = 1; $i < count($array); $i++) {
            $current->next = new ListNode($array[$i]);
            $current = $current->next;
        }

        return $head;
    }

    public static function listToArray($l): array
    {
        $result = [];
        $current = $l;

        while ($current !== null) {
            $result[] = $current->val;
            $current = $current->next;
        }

        return $result;
    }
}
