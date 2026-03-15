<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HtmlAsset extends AssetBundle
{

  private static function web(): string
  {
    return \Yii::getAlias('@web');
  }

  private static array $headerTags = [];
  private static array $footerTags = [];

  private static array $headerScriptTag = [];
  private static array $headerStyleTag = [];
  private static array $footerScriptTag = [];
  private static array $footerStyleTag = [];

  public static function addHeaderTags($tags)
  {
    HtmlAsset::$headerTags[] = $tags;
  }

  public static function addFooterTags($tags)
  {
    HtmlAsset::$footerTags[] = $tags;
  }

  public static function getHeaderTags()
  {
    foreach (HtmlAsset::$headerTags as $item) {
      echo $item;
    }
  }

  public static function getFooterTags()
  {
    foreach (HtmlAsset::$footerTags as $item) {
      echo $item;
    }
  }

  public static function getHeaderStyleTag()
  {
    foreach (self::$headerStyleTag as $item) {
      echo $item;
    }
  }

  public static function addHeaderStyleTag(string $headerStyleTag): void
  {
    $web = self::web();
    self::$headerStyleTag[] = "<link rel=\"stylesheet\" href=\"$web$headerStyleTag\">";
  }

  public static function addHeaderStyleTagEx(string $headerStyleTag): void
  {
    self::$headerStyleTag[] = "<link rel=\"stylesheet\" href=\"$headerStyleTag\"><br>";
  }

  public static function getHeaderScriptTag()
  {
    foreach (self::$headerScriptTag as $item) {
      echo $item;
    }
  }


  public static function addHeaderScriptTag(string $headerScriptTag): void
  {
    $web = self::web();
    self::$headerScriptTag[] = "<script src=\"$web$headerScriptTag\"></script>";
  }

  public static function addHeaderScriptTagEx(string $headerScriptTag): void
  {

    self::$headerScriptTag[] = "<script src=\"$headerScriptTag\"></script>";
  }

  public static function getFooterScriptTag()
  {
    foreach (self::$footerScriptTag as $item) {
      echo $item;
    }
  }

  public static function addFooterScriptTag(string $footerScriptTag): void
  {
    $web = self::web();
    self::$footerScriptTag[] = "<script src=\"$web$footerScriptTag\"></script>";
  }
  public static function addFooterScriptTagEx(string $footerScriptTag): void
  {
    self::$footerScriptTag[] = "<script src=\"$footerScriptTag\"></script>";
  }
  public static function addFooterScript(string $footerScript): void
  {
    self::$footerScriptTag[] = "<script> $footerScript </script>";
  }

}
