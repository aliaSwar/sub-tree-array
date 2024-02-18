<?php
class TreeBuilder
{
     private $data;

     public function __construct(array $data)
     {
          $this->data = $data;
     }

     public function buildSubTree($parentKey = null): array
     {
          $subTree = [];

          foreach ($this->data as $item) {
               [$key, $value] = $item;

               if (!$this->shouldIncludeItem($key, $parentKey)) {
                    continue;
               }

               $subKey = $this->getSubKey($key, $parentKey);
               $subKeyParts = $this->getSubKeyParts($subKey);
               $subTreeKey = $this->getSubTreeKey($subKeyParts);

               $subTree[$subTreeKey] = [
                    'title' => $value,
                    'items' => $this->buildSubTree($key),
               ];
          }

          return $subTree;
     }

     private function shouldIncludeItem(string $key, $parentKey): bool
     {
          return $parentKey === null || strpos($key, $parentKey . '.') === 0;
     }

     private function getSubKey(string $key, $parentKey): string
     {
          return ($parentKey === null) ? $key : substr($key, strlen($parentKey) + 1);
     }

     private function getSubKeyParts(string $subKey): array
     {
          return explode('.', $subKey);
     }

     private function getSubTreeKey(array $subKeyParts): string
     {
          return end($subKeyParts);
     }
}