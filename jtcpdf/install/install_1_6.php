<?php
/**
* @package     jelix
* @subpackage  jtcpdf module
* @author      Laurent Jouanneau
* @contributor
* @copyright   2009-2023 Laurent Jouanneau
* @link        http://www.jelix.org
* @licence     GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
*/

/**
 * Installer for Jelix <=1.6
 */
class jtcpdfModuleInstaller extends jInstallerModule {

    function install() {
        $ini = $this->entryPoint->localConfigIni->getMaster();
        // setup the tcpdf response if not already done
        if (!$ini->getValue('tcpdf', 'responses')) {
            $ini->setValue('tcpdf', "jtcpdf~jResponseTcpdf", "responses");
        }
        if (!$ini->getValue('tcpdf', '_coreResponses')) {
            $ini->setValue('tcpdf', "jtcpdf~jResponseTcpdf", "_coreResponses");
        }
    }
}