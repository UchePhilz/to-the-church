<?php

namespace app\assets;

use InvalidArgumentException;

class MetadataFormatter {
    /**
     * Formats JSON into a readable string with Bootstrap styling.
     * @param string $jsonData Raw JSON string.
     * @param array $keyLabelMap Optional map to convert keys into friendly labels.
     * @return string Readable formatted HTML with Bootstrap styling.
     */
    public static function toReadableString(string $jsonData, array $keyLabelMap = null): string {
        $jsonObject = json_decode($jsonData, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new InvalidArgumentException('Error: Invalid JSON data: ' . json_last_error_msg().': '.$jsonData);
        }
        
        ob_start();
        ?>
        <div class="card">
            <div class="card-body">
                <?= self::processObject($jsonObject, $keyLabelMap, 0) ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    private static function processObject($obj, $labelMap, $indent): string {
        if (!is_array($obj)) {
            return '';
        }
        
        $output = '<div class="ms-' . $indent . '">';
        
        foreach ($obj as $key => $value) {
            $label = isset($labelMap[$key]) ? $labelMap[$key] : self::toTitleCase($key);
            
            if (is_array($value) && self::isAssociativeArray($value)) {
                $output .= '<div class="mb-2">';
                $output .= '<strong>' . htmlspecialchars($label) . ':</strong>';
                $output .= '<div class="ms-3">' . self::processObject($value, $labelMap, $indent + 3) . '</div>';
                $output .= '</div>';
            } elseif (is_array($value)) {
                $output .= '<div class="mb-2">';
                $output .= '<strong>' . htmlspecialchars($label) . ':</strong>';
                $output .= '<div class="ms-3">' . self::processArray($value, $labelMap, $indent + 3) . '</div>';
                $output .= '</div>';
            } else {
                $output .= '<div class="mb-2">';
                $output .= '<strong>' . htmlspecialchars($label) . ':</strong> ';
                $output .= '<span>' . htmlspecialchars((string)$value) . '</span>';
                $output .= '</div>';
            }
        }
        
        $output .= '</div>';
        
        return $output;
    }

    private static function processArray($array, $labelMap, $indent): string {
        if (!is_array($array)) {
            return '';
        }
        
        $output = '<ul class="list-group list-group-flush">';
        
        foreach ($array as $item) {
            if (is_array($item) && self::isAssociativeArray($item)) {
                $output .= '<li class="list-group-item">';
                $output .= self::processObject($item, $labelMap, $indent);
                $output .= '</li>';
            } else {
                $output .= '<li class="list-group-item">';
                $output .= htmlspecialchars((string)$item);
                $output .= '</li>';
            }
        }
        
        $output .= '</ul>';
        
        return $output;
    }

    private static function toTitleCase(string $input): string {
        // Split by uppercase letters or underscores
        $parts = preg_split('/(?=[A-Z])|_/', $input);
        $result = '';
        
        foreach ($parts as $part) {
            if (!empty($part)) {
                $result .= ucfirst(strtolower($part)) . ' ';
            }
        }
        
        return trim($result);
    }
    
    private static function isAssociativeArray($array): bool {
        if (!is_array($array)) {
            return false;
        }
        
        // If array has string keys, it's associative
        return array_keys($array) !== range(0, count($array) - 1);
    }
}
