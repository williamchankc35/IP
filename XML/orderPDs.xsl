<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : orderPDs.xsl
    Created on : August 10, 2018, 9:14 PM
    Author     : William
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>Order Pickup and Delivery List</title>
            </head>
            <body>
                <h1>Order Pickup and Delivery List</h1>
                <hr/>
                <table border="1">
                    <tr bgcolor="#bdfbff">
                        <th>No</th>
                        <th>Type</th>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Staff ID</th>
                        <th>Staff Name</th>
                    </tr>
                    <xsl:for-each select="orderPDs/orderPD">
                        <tr>
                            <td>
                                <xsl:value-of select="position()"/>
                            </td>
                            <td>
                                <xsl:value-of select="orderPDtype"/>
                            </td>
                            <td>
                                <xsl:value-of select="orderID"/>
                            </td>
                            <td>
                                <xsl:value-of select="orderPDDate"/>
                            </td>
                            <td>
                                <xsl:value-of select="orderPDTime"/>
                            </td>
                            <td>
                                <xsl:value-of select="orderPDStaffID"/>
                            </td>
                            <td>
                                <xsl:value-of select="orderPDStaffName"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
